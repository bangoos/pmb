<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Dashboard Statistics
        $stats = [
            'total_pendaftar' => \App\Models\Pendaftaran::count(),
            'pendaftar_hari_ini' => \App\Models\Pendaftaran::whereDate('created_at', today())->count(),
            'total_pembayaran_registrasi' => \App\Models\Payment::where('jenis', 'registrasi')->where('status', 'settlement')->sum('jumlah'),
            'total_pembayaran_awal' => \App\Models\Payment::where('jenis', 'awal')->where('status', 'settlement')->sum('jumlah'),
            'pendaftar_per_tahap' => $this->getPendaftarPerTahap(),
            'pendaftar_per_jalur' => $this->getPendaftarPerJalur(),
            'pendaftar_per_bulan' => $this->getPendaftarPerBulan(),
        ];

        // Recent Activities
        $recent_pendaftar = \App\Models\Pendaftaran::with('user')
            ->latest()
            ->take(10)
            ->get();

        // Pending Verifications
        $pending_verifications = \App\Models\Pendaftaran::where('biodata_lengkap', true)
            ->where('dokumen_terverifikasi', false)
            ->with('user')
            ->take(5)
            ->get();

        // Recent Payments
        $recent_payments = \App\Models\Payment::with(['user'])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard.index', compact(
            'stats',
            'recent_pendaftar',
            'pending_verifications',
            'recent_payments'
        ));
    }

    private function getPendaftarPerTahap()
    {
        return \App\Models\Pendaftaran::select('tahap', \DB::raw('count(*) as count'))
            ->groupBy('tahap')
            ->orderBy('tahap')
            ->pluck('count', 'tahap')
            ->toArray();
    }

    private function getPendaftarPerJalur()
    {
        return \App\Models\Pendaftaran::select('jalur_pendaftaran_id', \DB::raw('count(*) as count'))
            ->with('jalurPendaftaran')
            ->groupBy('jalur_pendaftaran_id')
            ->orderByDesc('count')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->jalurPendaftaran->nama ?? 'Unknown' => $item->count];
            })
            ->toArray();
    }

    private function getPendaftarPerBulan()
    {
        return \App\Models\Pendaftaran::select(
                \DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                \DB::raw('count(*) as count')
            )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();
    }

    public function pendaftarList(Request $request)
    {
        $query = \App\Models\Pendaftaran::with(['user', 'jalurPendaftaran', 'programStudi']);

        // Filters
        if ($request->filled('tahap')) {
            $query->where('tahap', $request->tahap);
        }

        if ($request->filled('jalur_pendaftaran_id')) {
            $query->where('jalur_pendaftaran_id', $request->jalur_pendaftaran_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $pendaftar = $query->latest()->paginate(20);

        $jalur_options = \App\Models\JalurPendaftaran::pluck('nama', 'id')->toArray();
        $tahap_options = [1, 2, 3, 4, 5, 6];

        return view('admin.pendaftar.index', compact(
            'pendaftar',
            'jalur_options',
            'tahap_options'
        ));
    }

    public function showPendaftar($id)
    {
        $pendaftaran = \App\Models\Pendaftaran::with(['user', 'jalurPendaftaran', 'programStudi'])
            ->findOrFail($id);

        return view('admin.pendaftar.show', compact('pendaftaran'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pendaftaran = \App\Models\Pendaftaran::findOrFail($id);
        
        $request->validate([
            'tahap' => 'required|integer|min:1|max:6',
            'notes' => 'nullable|string'
        ]);

        $pendaftaran->update([
            'tahap' => $request->tahap,
        ]);

        return redirect()->back()
            ->with('success', 'Status pendaftaran berhasil diperbarui');
    }
}
