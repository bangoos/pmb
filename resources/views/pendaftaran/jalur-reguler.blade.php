@extends('layouts.landing')

@section('title', 'Jalur Pendaftaran Reguler - PMB UMBK')

@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background: #A00000; padding: 40px 0; text-align: center; color: white;">
        <div class="container">
            <h1 style="font-size: 2.5rem; font-weight: 700;">Jalur Pendaftaran Reguler</h1>
            <p>Pendaftaran mahasiswa baru jalur reguler untuk tahun akademik 2026/2027</p>
        </div>
    </section>

    <!-- Jalur Reguler Content -->
    <section class="jalur-content" style="padding: 60px 0; background: #f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="jalur-info">
                        <h2>Tentang Jalur Reguler</h2>
                        <p>Jalur pendaftaran reguler adalah jalur pendaftaran utama yang dibuka untuk umum bagi lulusan SMA/SMK/MA atau sederajat yang ingin melanjutkan pendidikan ke jenjang Sarjana (S1) di Universitas Muhammadiyah Bekasi Karawang.</p>

                        <!-- Keunggulan -->
                        <div class="feature-section">
                            <h3><i class="fas fa-star"></i> Keunggulan Jalur Reguler</h3>
                            <div class="features-grid">
                                <div class="feature-item">
                                    <i class="fas fa-clock"></i>
                                    <h4>Jadwal Fleksibel</h4>
                                    <p>Kuliah reguler dengan jadwal Senin-Jumat, pukul 08:00-16:00 WIB</p>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-users"></i>
                                    <h4>Interaksi Lengkap</h4>
                                    <p>Interaksi langsung dengan dosen dan mahasiswa lainnya</p>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-university"></i>
                                    <h4>Fasilitas Penuh</h4>
                                    <p>Akses penuh ke semua fasilitas kampus dan laboratorium</p>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-trophy"></i>
                                    <h4>Prestasi Unggul</h4>
                                    <p>Banyak kesempatan mengikuti kompetisi akademik dan non-akademik</p>
                                </div>
                            </div>
                        </div>

                        <!-- Persyaratan -->
                        <div class="requirement-section">
                            <h3><i class="fas fa-list-check"></i> Persyaratan Pendaftaran</h3>
                            <div class="requirements">
                                <div class="requirement-group">
                                    <h4>Persyaratan Umum:</h4>
                                    <ul>
                                        <li>Lulusan SMA/SMK/MA atau sederajat tahun 2024, 2025, atau 2026</li>
                                        <li>Usia maksimal 21 tahun pada tahun pendaftaran</li>
                                        <li>Sehat jasmani dan rohani (dibuktikan dengan surat keterangan dokter)</li>
                                        <li>Berakhlak mulia dan berkelakuan baik</li>
                                        <li>Bersedia mematuhi semua peraturan yang berlaku di UMBK</li>
                                    </ul>
                                </div>

                                <div class="requirement-group">
                                    <h4>Persyaratan Akademik:</h4>
                                    <ul>
                                        <li>Nilai rata-rata rapor semester 1-5 minimal 70.00</li>
                                        <li>Tidak ada nilai yang kurang dari 6.00 pada mata pelajaran utama</li>
                                        <li>Prestasi akademik/non-akademik akan menjadi nilai tambah</li>
                                    </ul>
                                </div>

                                <div class="requirement-group">
                                    <h4>Dokumen yang Diperlukan:</h4>
                                    <ul>
                                        <li>Pas foto terbaru (warna, ukuran 3x4 cm, background merah)</li>
                                        <li>Fotokopi ijazah/SKL yang telah dilegalisir</li>
                                        <li>Fotokopi rapor semester 1-5 yang telah dilegalisir</li>
                                        <li>Fotokopi KTP/KK/Akte Kelahiran</li>
                                        <li>Sertifikat prestasi (jika ada)</li>
                                        <li>Surat keterangan sehat dari dokter</li>
                                        <li>Surat keterangan berkelakuan baik dari sekolah</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Tahapan Seleksi -->
                        <div class="selection-section">
                            <h3><i class="fas fa-tasks"></i> Tahapan Seleksi</h3>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-marker">1</div>
                                    <div class="timeline-content">
                                        <h4>Pendaftaran Online</h4>
                                        <p>Mengisi formulir pendaftaran dan upload dokumen melalui website PMB</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-marker">2</div>
                                    <div class="timeline-content">
                                        <h4>Verifikasi Dokumen</h4>
                                        <p>Tim PMB akan memverifikasi kelengkapan dan keabsahan dokumen</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-marker">3</div>
                                    <div class="timeline-content">
                                        <h4>Tes Potensi Akademik (TPA)</h4>
                                        <p>Tes kemampuan verbal, numerik, dan logika</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-marker">4</div>
                                    <div class="timeline-content">
                                        <h4>Tes Bahasa Inggris</h4>
                                        <p>Tes kemampuan bahasa Inggris (reading, grammar, vocabulary)</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-marker">5</div>
                                    <div class="timeline-content">
                                        <h4>Wawancara</h4>
                                        <p>Wawancara untuk mengetahui motivasi dan potensi calon mahasiswa</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-marker">6</div>
                                    <div class="timeline-content">
                                        <h4>Pengumuman Hasil</h4>
                                        <p>Pengumuman kelulusan melalui website dan email</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jadwal -->
                        <div class="schedule-section">
                            <h3><i class="fas fa-calendar-alt"></i> Jadwal Pendaftaran</h3>
                            <div class="schedule-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kegiatan</th>
                                            <th>Gelombang 1</th>
                                            <th>Gelombang 2</th>
                                            <th>Gelombang 3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pendaftaran Online</td>
                                            <td>1 Des - 31 Mar</td>
                                            <td>1 Apr - 30 Jun</td>
                                            <td>1 Jul - 30 Sep</td>
                                        </tr>
                                        <tr>
                                            <td>Tes Seleksi</td>
                                            <td>5-10 Apr</td>
                                            <td>5-10 Jul</td>
                                            <td>5-10 Okt</td>
                                        </tr>
                                        <tr>
                                            <td>Pengumuman Hasil</td>
                                            <td>15 Apr</td>
                                            <td>15 Jul</td>
                                            <td>15 Okt</td>
                                        </tr>
                                        <tr>
                                            <td>Registrasi Ulang</td>
                                            <td>16-30 Apr</td>
                                            <td>16-31 Jul</td>
                                            <td>16-31 Okt</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="sidebar-info">
                        <div class="info-card">
                            <h4>Informasi Penting</h4>
                            <div class="info-item">
                                <i class="fas fa-money-bill-wave"></i>
                                <div>
                                    <h5>Biaya Pendaftaran</h5>
                                    <p>Rp 300.000</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-users"></i>
                                <div>
                                    <h5>Kuota</h5>
                                    <p>Tersedia 30 mahasiswa per program studi</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <h5>Waktu Kuliah</h5>
                                    <p>Senin-Jumat, 08:00-16:00 WIB</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="info-card">
                            <h4>Kontak Pendaftaran</h4>
                            <ul>
                                <li><i class="fas fa-phone"></i> (+62) 813 9566 247</li>
                                <li><i class="fas fa-phone"></i> (+62) 878 6389 5222</li>
                                <li><i class="fas fa-envelope"></i> pmb@umbk.ac.id</li>
                                <li><i class="fas fa-globe"></i> pmb.umbk.ac.id</li>
                            </ul>
                        </div>

                        <div class="cta-card">
                            <h4>Daftar Jalur Reguler</h4>
                            <p>Jadilah bagian dari mahasiswa UMBK!</p>
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block">Daftar Sekarang</a>
                        </div>

                        <div class="info-card">
                            <h4>Jalur Lainnya</h4>
                            <ul>
                                <li><a href="{{ route('pendaftaran.kelas-karyawan') }}">Jalur Kelas Karyawan</a></li>
                                <li><a href="{{ route('pendaftaran.rpl') }}">Jalur RPL</a></li>
                                <li><a href="{{ route('beasiswa.index') }}">Program Beasiswa</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .jalur-info h2 {
            color: #A00000;
            margin-bottom: 20px;
        }

        .feature-section, .requirement-section, .selection-section, .schedule-section {
            background: white;
            padding: 30px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border-left: 5px solid #A00000;
        }

        .feature-section h3, .requirement-section h3, .selection-section h3, .schedule-section h3 {
            color: #A00000;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .feature-item {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .feature-item i {
            font-size: 2rem;
            color: #A00000;
            margin-bottom: 15px;
        }

        .feature-item h4 {
            color: #A00000;
            margin-bottom: 10px;
        }

        .requirements {
            margin-top: 20px;
        }

        .requirement-group {
            margin-bottom: 25px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .requirement-group h4 {
            color: #A00000;
            margin-bottom: 15px;
        }

        .requirement-group ul {
            margin: 0;
            padding-left: 20px;
        }

        .requirement-group li {
            margin-bottom: 8px;
        }

        .timeline {
            position: relative;
            margin-top: 20px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #A00000;
        }

        .timeline-item {
            position: relative;
            padding-left: 60px;
            margin-bottom: 30px;
        }

        .timeline-marker {
            position: absolute;
            left: 0;
            top: 0;
            width: 40px;
            height: 40px;
            background: #A00000;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .timeline-content h4 {
            color: #A00000;
            margin-bottom: 5px;
        }

        .schedule-table {
            overflow-x: auto;
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #A00000;
        }

        .sidebar-info {
            position: sticky;
            top: 20px;
        }

        .info-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        .info-card h4 {
            color: #A00000;
            margin-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .info-item i {
            font-size: 1.5rem;
            color: #A00000;
        }

        .info-item h5 {
            margin: 0 0 5px 0;
            color: #A00000;
        }

        .info-item p {
            margin: 0;
        }

        .info-card ul {
            list-style: none;
            padding: 0;
        }

        .info-card li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .info-card i {
            margin-right: 10px;
            color: #A00000;
            width: 20px;
        }

        .info-card a {
            color: #A00000;
            text-decoration: none;
        }

        .info-card a:hover {
            text-decoration: underline;
        }

        .cta-card {
            background: #A00000;
            color: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
        }

        .cta-card h4 {
            color: white;
            border-bottom: 2px solid rgba(255,255,255,0.2);
            margin-bottom: 15px;
        }

        .btn-block {
            display: block;
            width: 100%;
            text-align: center;
        }
    </style>
@endsection
