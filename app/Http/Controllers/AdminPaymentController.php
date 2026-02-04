<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPaymentController extends Controller
{
    public function index(Request $request)
    {
        $query = Payment::with('user');

        // Filters
        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $payments = $query->latest()->paginate(20);

        // Statistics
        $stats = [
            'total_payments' => Payment::count(),
            'total_amount' => Payment::sum('jumlah'),
            'pending_payments' => Payment::where('status', 'pending')->count(),
            'settlement_payments' => Payment::where('status', 'settlement')->count(),
            'total_registrasi' => Payment::where('jenis', 'registrasi')->sum('jumlah'),
            'total_awal' => Payment::where('jenis', 'awal')->sum('jumlah'),
        ];

        return view('admin.payments.index', compact('payments', 'stats'));
    }

    public function show($id)
    {
        $payment = Payment::with('user')->findOrFail($id);
        return view('admin.payments.show', compact('payment'));
    }

    public function updateStatus(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,settlement,expire,cancel'
        ]);

        $payment->update([
            'status' => $request->status,
            'paid_at' => $request->status === 'settlement' ? now() : $payment->paid_at,
        ]);

        return redirect()->back()
            ->with('success', 'Status pembayaran berhasil diperbarui');
    }

    public function export(Request $request)
    {
        $payments = Payment::with('user');

        if ($request->filled('jenis')) {
            $payments->where('jenis', $request->jenis);
        }

        if ($request->filled('status')) {
            $payments->where('status', $request->status);
        }

        $payments = $payments->latest()->get();

        $filename = 'payments_' . date('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($payments) {
            $file = fopen('php://output', 'w');
            
            // Header CSV
            fputcsv($file, [
                'ID', 'Order ID', 'Nama User', 'Email', 'Jenis', 
                'Jumlah', 'Status', 'Tanggal Bayar', 'Dibuat'
            ]);

            foreach ($payments as $payment) {
                fputcsv($file, [
                    $payment->id,
                    $payment->order_id,
                    $payment->user->name,
                    $payment->user->email,
                    $payment->jenis,
                    $payment->jumlah,
                    $payment->status,
                    $payment->paid_at ? $payment->paid_at->format('d/m/Y H:i') : '-',
                    $payment->created_at->format('d/m/Y H:i')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
