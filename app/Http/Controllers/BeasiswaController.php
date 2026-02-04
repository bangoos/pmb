<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function index()
    {
        return view('beasiswa.index');
    }

    public function show($type)
    {
        $beasiswaData = $this->getBeasiswaData($type);
        
        if (!$beasiswaData) {
            abort(404);
        }

        return view('beasiswa.show', ['beasiswa' => $beasiswaData]);
    }

    private function getBeasiswaData($type)
    {
        $beasiswa = [
            'hafidz' => [
                'title' => 'Beasiswa Hafidz Qur\'an',
                'image' => 'beasiswa-hafidz.png',
                'description' => 'Beasiswa penuh bagi para penghafal Al-Qur\'an yang berprestasi dan berkomitmen menjaga hafalannya.',
                'full_description' => 'Beasiswa Hafidz Qur\'an adalah program beasiswa penuh yang diberikan kepada calon mahasiswa yang telah hafal Al-Qur\'an minimal 15 juz. Program ini bertujuan untuk mendukung para penghafal Al-Qur\'an dalam menempuh pendidikan tinggi di UMBK.',
                'requirements' => [
                    'Muslim dan berakhlak mulia',
                    'Hafal Al-Qur\'an minimal 15 juz',
                    'Mampu membaca Al-Qur\'an dengan tajwid yang benar',
                    'Lulusan SMA/SMK/MA atau sederajat',
                    'Usia maksimal 21 tahun',
                    'Sehat jasmani dan rohani',
                    'Bersedia mengikuti program tahfidz di kampus'
                ],
                'benefits' => [
                    'Gratis biaya kuliah selama 8 semester',
                    'Gratis biaya registrasi dan praktikum',
                    'Uang saku bulanan',
                    'Program pengembangan tahfidz',
                    'Mentoring khusus',
                    'Kesempatan mengikuti kompetisi tahfidz'
                ],
                'registration_flow' => [
                    'Pendaftaran online melalui website PMB',
                    'Upload dokumen persyaratan',
                    'Tes hafalan Al-Qur\'an (offline)',
                    'Tes wawancara',
                    'Pengumuman hasil seleksi'
                ]
            ],
            'karawang-cerdas' => [
                'title' => 'Beasiswa Karawang Cerdas',
                'image' => 'beasiswa-karawang-cerdas.png',
                'description' => 'Program beasiswa dari Pemerintah Kabupaten Karawang untuk putra-putri daerah berprestasi.',
                'full_description' => 'Beasiswa Karawang Cerdas adalah program kerjasama antara Pemerintah Kabupaten Karawang dengan UMBK untuk memberikan kesempatan pendidikan tinggi bagi putra-putri terbaik Karawang yang memiliki potensi akademik namun terbatas secara ekonomi.',
                'requirements' => [
                    'Warga Kabupaten Karawang (dibuktikan dengan KTP/KK)',
                    'Lulusan SMA/SMK/MA Kabupaten Karawang',
                    'Nilai rata-rata rapor minimal 80',
                    'Prestasi akademik/non-akademik di tingkat kabupaten atau lebih tinggi',
                    'Orang tua/wali memiliki penghasilan terbatas',
                    'Usia maksimal 21 tahun'
                ],
                'benefits' => [
                    'Potongan biaya kuliah 50%',
                    'Bantuan biaya hidup',
                    'Program pengembangan soft skills',
                    'Kesempatan magang di Pemerintah Daerah',
                    'Mentoring karir'
                ],
                'registration_flow' => [
                    'Pendaftaran online melalui website PMB',
                    'Upload dokumen persyaratan',
                    'Verifikasi dokumen oleh panitia',
                    'Tes tertulis dan wawancara',
                    'Pengumuman hasil seleksi bersama Pemda Karawang'
                ]
            ],
            'kip-kuliah' => [
                'title' => 'Beasiswa KIP Kuliah',
                'image' => 'beasiswa-kip-kuliah.png',
                'description' => 'Bantuan biaya pendidikan dari pemerintah bagi lulusan SMA/SMK yang memiliki potensi akademik namun keterbatasan ekonomi.',
                'full_description' => 'Kartu Indonesia Pintar (KIP) Kuliah adalah program bantuan biaya pendidikan dari pemerintah yang diperuntukkan bagi lulusan SMA/SMK/MA yang memiliki potensi akademik baik namun terbatas secara ekonomi. UMBK sebagai mitra pemerintah menyediakan program ini untuk mahasiswa.',
                'requirements' => [
                    'Lulusan SMA/SMK/MA atau sederajat',
                    'Usia maksimal 21 tahun pada saat mendaftar',
                    'Berasal dari keluarga mampu (dibuktikan dengan surat keterangan tidak mampu)',
                    'Memiliki Nomor Induk Kependudukan (NIK)',
                    'Tidak sedang menerima beasiswa lain',
                    'Memiliki potensi akademik yang baik'
                ],
                'benefits' => [
                    'Gratis biaya kuliah (UKT)',
                    'Gratis biaya registrasi',
                    'Uang saku bulanan',
                    'Bantuan biaya hidup',
                    'Program pengembangan akademik'
                ],
                'registration_flow' => [
                    'Mendaftar melalui website resmi KIP Kuliah',
                    'Upload dokumen persyaratan',
                    'Verifikasi data oleh Dinas Pendidikan',
                    'Seleksi oleh UMBK',
                    'Pengumuman hasil seleksi'
                ]
            ],
            'mitra-zis' => [
                'title' => 'Beasiswa Mitra ZIS',
                'image' => 'beasiswa-mitra-zis.png',
                'description' => 'Beasiswa kerjasama dengan Lembaga Zakat Infaq Shadaqah untuk mahasiswa yang membutuhkan.',
                'full_description' => 'Beasiswa Mitra ZIS adalah program kerjasama antara UMBK dengan Lembaga Zakat Infaq Shadaqah (ZIS) untuk memberikan bantuan pendidikan kepada mahasiswa yang berprestasi namun memiliki keterbatasan ekonomi.',
                'requirements' => [
                    'Muslim dan berakhlak mulia',
                    'Lulusan SMA/SMK/MA atau sederajat',
                    'Berasal dari keluarga kurang mampu',
                    'Nilai rata-rata rapor minimal 75',
                    'Usia maksimal 21 tahun',
                    'Bersedia mengikuti program pengembangan diri'
                ],
                'benefits' => [
                    'Potongan biaya kuliah hingga 75%',
                    'Bantuan biaya hidup',
                    'Program pengembangan keagamaan',
                    'Mentoring akademik dan spiritual',
                    'Kesempatan mengikuti kegiatan sosial'
                ],
                'registration_flow' => [
                    'Pendaftaran online melalui website PMB',
                    'Upload dokumen persyaratan',
                    'Survey rumah oleh tim ZIS',
                    'Tes wawancara',
                    'Pengumuman hasil seleksi'
                ]
            ],
            'persyarikatan' => [
                'title' => 'Beasiswa Persyarikatan',
                'image' => 'beasiswa-persyarikatan.png',
                'description' => 'Khusus bagi kader Muhammadiyah dan keluarga besar persyarikatan yang aktif di ortom.',
                'full_description' => 'Beasiswa Persyarikatan adalah program khusus untuk kader Muhammadiyah dan keluarga besar persyarikatan yang aktif di organisasi otonom (ortom) seperti Pemuda Muhammadiyah, Nasyiatul Aisyiyah, Hizbul Wathan, dan Tapak Suci.',
                'requirements' => [
                    'Muslim dan kader aktif Muhammadiyah/ortom',
                    'Memiliki surat rekomendasi dari pimpinan ortom',
                    'Lulusan SMA/SMK/MA atau sederajat',
                    'Minimal 2 tahun aktif di ortom',
                    'Usia maksimal 21 tahun',
                    'Bersedia melanjutkan kegiatan dakwah di kampus'
                ],
                'benefits' => [
                    'Potongan biaya kuliah 50%',
                    'Program pengembangan kader',
                    'Kesempatan mengikuti pelatihan kepemimpinan',
                    'Mentoring khusus kader Muhammadiyah',
                    'Jaringan luas di lingkungan persyarikatan'
                ],
                'registration_flow' => [
                    'Pendaftaran online melalui website PMB',
                    'Upload dokumen persyaratan',
                    'Verifikasi keaktifan di ortom',
                    'Tes wawancara dengan pimpinan persyarikatan',
                    'Pengumuman hasil seleksi'
                ]
            ],
            'prestasi' => [
                'title' => 'Beasiswa Prestasi',
                'image' => 'beasiswa-prestasi.png',
                'description' => 'Apresiasi bagi calon mahasiswa dengan prestasi akademik maupun non-akademik di tingkat regional hingga nasional.',
                'full_description' => 'Beasiswa Prestasi adalah program apresiasi bagi calon mahasiswa yang memiliki prestasi gemilang di bidang akademik maupun non-akademik di tingkat regional, nasional, maupun internasional.',
                'requirements' => [
                    'Lulusan SMA/SMK/MA atau sederajat',
                    'Memiliki prestasi di tingkat regional/nasional/internasional',
                    'Nilai rata-rata rapor minimal 85',
                    'Usia maksimal 21 tahun',
                    'Dokumentasi prestasi yang valid',
                    'Surat rekomendasi dari sekolah/institusi'
                ],
                'benefits' => [
                    'Potongan biaya kuliah hingga 100%',
                    'Uang saku bulanan',
                    'Program pengembangan bakat',
                    'Kesempatan mengikuti kompetisi tingkat tinggi',
                    'Mentoring khusus bidang prestasi'
                ],
                'registration_flow' => [
                    'Pendaftaran online melalui website PMB',
                    'Upload dokumen prestasi dan persyaratan',
                    'Verifikasi dokumen prestasi',
                    'Tes wawancara dan presentasi',
                    'Pengumuman hasil seleksi'
                ]
            ],
            'tahfidz' => [
                'title' => 'Beasiswa Tahfidz',
                'image' => 'beasiswa-tahfidz.svg',
                'description' => 'Program beasiswa khusus untuk tahfidz dengan hafalan juz tertentu.',
                'full_description' => 'Beasiswa Tahfidz adalah program khusus untuk calon mahasiswa yang memiliki hafalan Al-Qur\'an dengan juz tertentu dan berkomitmen untuk meningkatkan hafalannya selama kuliah di UMBK.',
                'requirements' => [
                    'Muslim dan berakhlak mulia',
                    'Hafal Al-Qur\'an minimal 5 juz',
                    'Mampu membaca Al-Qur\'an dengan tajwid yang benar',
                    'Lulusan SMA/SMK/MA atau sederajat',
                    'Usia maksimal 21 tahun',
                    'Bersedia mengikuti program tahfidz di kampus'
                ],
                'benefits' => [
                    'Potongan biaya kuliah 50%',
                    'Program pengembangan tahfidz intensif',
                    'Mentoring khusus tahfidz',
                    'Kesempatan mengikuti kompetisi tahfidz',
                    'Bantuan buku-buku pendukung'
                ],
                'registration_flow' => [
                    'Pendaftaran online melalui website PMB',
                    'Upload dokumen persyaratan',
                    'Tes hafalan Al-Qur\'an',
                    'Tes wawancara',
                    'Pengumuman hasil seleksi'
                ]
            ]
        ];

        return $beasiswa[$type] ?? null;
    }
}
