<?php

namespace App\Http\Controllers;

use App\Models\SoalTes;
use App\Models\JawabanTes;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminTestController extends Controller
{
    public function index(Request $request)
    {
        $soal = SoalTes::withCount('jawabanTes')->latest()->paginate(20);
        
        $stats = [
            'total_soal' => SoalTes::count(),
            'total_jawaban' => JawabanTes::count(),
            'rata_rata_nilai' => Pendaftaran::whereNotNull('nilai_tes')->avg('nilai_tes'),
            'peserta_tes' => Pendaftaran::where('tes_selesai', true)->count(),
        ];

        return view('admin.tests.index', compact('soal', 'stats'));
    }

    public function create()
    {
        return view('admin.tests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string',
            'pilihan_b' => 'required|string',
            'pilihan_c' => 'required|string',
            'pilihan_d' => 'required|string',
            'jawaban_benar' => 'required|in:a,b,c,d',
            'bobot' => 'required|integer|min:1|max:100',
        ]);

        SoalTes::create($request->all());

        return redirect()->route('admin.tests.index')
            ->with('success', 'Soal tes berhasil ditambahkan');
    }

    public function show($id)
    {
        $soal = SoalTes::with(['jawabanTes' => function($query) {
            $query->with('pendaftaran.user');
        }])->findOrFail($id);

        return view('admin.tests.show', compact('soal'));
    }

    public function edit($id)
    {
        $soal = SoalTes::findOrFail($id);
        return view('admin.tests.edit', compact('soal'));
    }

    public function update(Request $request, $id)
    {
        $soal = SoalTes::findOrFail($id);
        
        $request->validate([
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string',
            'pilihan_b' => 'required|string',
            'pilihan_c' => 'required|string',
            'pilihan_d' => 'required|string',
            'jawaban_benar' => 'required|in:a,b,c,d',
            'bobot' => 'required|integer|min:1|max:100',
        ]);

        $soal->update($request->all());

        return redirect()->route('admin.tests.index')
            ->with('success', 'Soal tes berhasil diperbarui');
    }

    public function destroy($id)
    {
        $soal = SoalTes::findOrFail($id);
        $soal->delete();

        return redirect()->route('admin.tests.index')
            ->with('success', 'Soal tes berhasil dihapus');
    }

    public function results()
    {
        $results = Pendaftaran::with(['user', 'jawabanTes'])
            ->where('tes_selesai', true)
            ->latest('tes_dikerjakan_at')
            ->paginate(20);

        return view('admin.tests.results', compact('results'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls'
        ]);

        $file = $request->file('file');
        
        // Implement CSV/Excel import logic here
        // For now, just return success message
        
        return redirect()->back()
            ->with('success', 'Soal tes berhasil diimport');
    }

    public function export()
    {
        $soal = SoalTes::all();
        
        $filename = 'soal_tes_' . date('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($soal) {
            $file = fopen('php://output', 'w');
            
            fputcsv($file, [
                'ID', 'Pertanyaan', 'Pilihan A', 'Pilihan B', 
                'Pilihan C', 'Pilihan D', 'Jawaban Benar', 'Bobot'
            ]);

            foreach ($soal as $s) {
                fputcsv($file, [
                    $s->id,
                    $s->pertanyaan,
                    $s->pilihan_a,
                    $s->pilihan_b,
                    $s->pilihan_c,
                    $s->pilihan_d,
                    $s->jawaban_benar,
                    $s->bobot
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
