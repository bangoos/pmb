<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Payment;
use App\Models\JalurPendaftaran;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }

    public function pendaftarReport(Request $request)
    {
        $query = Pendaftaran::with(['user', 'jalurPendaftaran', 'programStudi']);

        // Filters
        if ($request->filled('jalur_pendaftaran_id')) {
            $query->where('jalur_pendaftaran_id', $request->jalur_pendaftaran_id);
        }

        if ($request->filled('program_studi_id')) {
            $query->where('program_studi_id', $request->program_studi_id);
        }

        if ($request->filled('tahap')) {
            $query->where('tahap', $request->tahap);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $pendaftar = $query->latest()->get();

        $jalur_options = JalurPendaftaran::pluck('nama', 'id')->toArray();
        $prodi_options = ProgramStudi::pluck('nama', 'id')->toArray();

        return view('admin.reports.pendaftar', compact(
            'pendaftar', 'jalur_options', 'prodi_options'
        ));
    }

    public function paymentReport(Request $request)
    {
        $query = Payment::with('user');

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $payments = $query->latest()->get();

        return view('admin.reports.payment', compact('payments'));
    }

    public function statisticsReport()
    {
        // Pendaftaran Statistics
        $pendaftar_per_bulan = Pendaftaran::select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('count(*) as count')
            )
            ->where('created_at', '>=', now()->subYear())
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $pendaftar_per_jalur = Pendaftaran::select('jalur_pendaftaran_id', DB::raw('count(*) as count'))
            ->with('jalurPendaftaran')
            ->groupBy('jalur_pendaftaran_id')
            ->get();

        $pendaftar_per_prodi = Pendaftaran::select('program_studi_id', DB::raw('count(*) as count'))
            ->with('programStudi')
            ->groupBy('program_studi_id')
            ->get();

        $pendaftar_per_tahap = Pendaftaran::select('tahap', DB::raw('count(*) as count'))
            ->groupBy('tahap')
            ->orderBy('tahap')
            ->get();

        // Payment Statistics
        $payment_per_bulan = Payment::select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('sum(jumlah) as total'),
                DB::raw('count(*) as count')
            )
            ->where('created_at', '>=', now()->subYear())
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $payment_per_jenis = Payment::select('jenis', DB::raw('sum(jumlah) as total'), DB::raw('count(*) as count'))
            ->groupBy('jenis')
            ->get();

        // Summary Statistics
        $summary = [
            'total_pendaftar' => Pendaftaran::count(),
            'pendaftar_hari_ini' => Pendaftaran::whereDate('created_at', today())->count(),
            'pendaftar_bulan_ini' => Pendaftaran::whereMonth('created_at', now()->month)
                                      ->whereYear('created_at', now()->year)->count(),
            'total_pembayaran' => Payment::sum('jumlah'),
            'pembayaran_settlement' => Payment::where('status', 'settlement')->sum('jumlah'),
            'rata_rata_nilai' => Pendaftaran::whereNotNull('nilai_tes')->avg('nilai_tes'),
            'tes_selesai' => Pendaftaran::where('tes_selesai', true)->count(),
        ];

        return view('admin.reports.statistics', compact(
            'pendaftar_per_bulan', 'pendaftar_per_jalur', 'pendaftar_per_prodi',
            'pendaftar_per_tahap', 'payment_per_bulan', 'payment_per_jenis', 'summary'
        ));
    }

    public function exportPendaftar(Request $request)
    {
        $query = Pendaftaran::with(['user', 'jalurPendaftaran', 'programStudi']);

        if ($request->filled('jalur_pendaftaran_id')) {
            $query->where('jalur_pendaftaran_id', $request->jalur_pendaftaran_id);
        }

        if ($request->filled('program_studi_id')) {
            $query->where('program_studi_id', $request->program_studi_id);
        }

        if ($request->filled('tahap')) {
            $query->where('tahap', $request->tahap);
        }

        $pendaftar = $query->latest()->get();

        $filename = 'laporan_pendaftar_' . date('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($pendaftar) {
            $file = fopen('php://output', 'w');
            
            fputcsv($file, [
                'ID', 'Nama', 'Email', 'No. HP', 'Jalur Pendaftaran', 
                'Program Studi 1', 'Program Studi 2', 'Tahap', 'Nilai Tes',
                'Status Biodata', 'Status Dokumen', 'NIM', 'Tanggal Daftar'
            ]);

            foreach ($pendaftar as $p) {
                fputcsv($file, [
                    $p->id,
                    $p->user->name,
                    $p->user->email,
                    $p->user->phone ?? '-',
                    $p->jalurPendaftaran->nama ?? '-',
                    $p->programStudi->nama ?? '-',
                    '-',
                    $p->tahap,
                    $p->nilai_tes ?? '-',
                    $p->biodata_lengkap ? 'Lengkap' : 'Belum',
                    $p->dokumen_terverifikasi ? 'Terverifikasi' : 'Belum',
                    $p->nim ?? '-',
                    $p->created_at->format('d/m/Y H:i')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportPayment(Request $request)
    {
        $query = Payment::with('user');

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $payments = $query->latest()->get();

        $filename = 'laporan_pembayaran_' . date('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($payments) {
            $file = fopen('php://output', 'w');
            
            fputcsv($file, [
                'ID', 'Order ID', 'Nama User', 'Email', 'Jenis', 
                'Jumlah', 'Status', 'Transaction ID', 'Tanggal Bayar', 'Dibuat'
            ]);

            foreach ($payments as $p) {
                fputcsv($file, [
                    $p->id,
                    $p->order_id,
                    $p->user->name,
                    $p->user->email,
                    $p->jenis,
                    $p->jumlah,
                    $p->status,
                    $p->transaction_id ?? '-',
                    $p->paid_at ? $p->paid_at->format('d/m/Y H:i') : '-',
                    $p->created_at->format('d/m/Y H:i')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
