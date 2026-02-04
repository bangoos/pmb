@extends('layouts.landing')

@section('title', 'Jalur Pendaftaran Kelas Karyawan - PMB UMBK')

@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background: #A00000; padding: 40px 0; text-align: center; color: white;">
        <div class="container">
            <h1 style="font-size: 2.5rem; font-weight: 700;">Jalur Pendaftaran Kelas Karyawan</h1>
            <p>Pendaftaran mahasiswa kelas karyawan untuk yang sudah bekerja</p>
        </div>
    </section>

    <!-- Jalur Kelas Karyawan Content -->
    <section class="jalur-content" style="padding: 60px 0; background: #f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="jalur-info">
                        <h2>Tentang Kelas Karyawan</h2>
                        <p>Program Kelas Karyawan UMBK dirancang khusus untuk profesional yang sudah bekerja namun ingin melanjutkan pendidikan ke jenjang Sarjana (S1). Program ini memberikan fleksibilitas waktu kuliah yang tidak mengganggu pekerjaan.</p>

                        <!-- Keunggulan -->
                        <div class="feature-section">
                            <h3><i class="fas fa-star"></i> Keunggulan Kelas Karyawan</h3>
                            <div class="features-grid">
                                <div class="feature-item">
                                    <i class="fas fa-moon"></i>
                                    <h4>Jadwal Malam</h4>
                                    <p>Kuliah malam hari (Senin-Jumat, 18:30-21:00 WIB)</p>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-calendar-week"></i>
                                    <h4>Weekend Class</h4>
                                    <p>Opsional kelas Sabtu-Minggu untuk kemudahan</p>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-laptop"></i>
                                    <h4>E-Learning</h4>
                                    <p>Dapat diakses online untuk materi tertentu</p>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-briefcase"></i>
                                    <h4>Praktis</h4>
                                    <p>Materi relevan dengan dunia kerja</p>
                                </div>
                            </div>
                        </div>

                        <!-- Program Studi -->
                        <div class="program-section">
                            <h3><i class="fas fa-graduation-cap"></i> Program Studi Tersedia</h3>
                            <div class="programs-list">
                                <div class="program-item">
                                    <h4>Manajemen (S1)</h4>
                                    <p>Fokus pada manajemen bisnis, SDM, pemasaran, dan keuangan yang relevan dengan industri.</p>
                                </div>
                                <div class="program-item">
                                    <h4>Akuntansi (S1)</h4>
                                    <p>Mempelajari akuntansi keuangan, manajerial, dan audit yang applicable di dunia kerja.</p>
                                </div>
                                <div class="program-item">
                                    <h4>Ilmu Komunikasi (S1)</h4>
                                    <p>Mengembangkan kemampuan komunikasi korporat, public relations, dan digital marketing.</p>
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
                                        <li>Lulusan SMA/SMK/MA atau sederajat (minimal 2 tahun yang lalu)</li>
                                        <li>Usia minimal 20 tahun, tidak ada batas maksimal</li>
                                        <li>Sudah bekerja (minimal 1 tahun) atau sedang mencari pekerjaan</li>
                                        <li>Sehat jasmani dan rohani</li>
                                        <li>Memiliki motivasi tinggi untuk belajar</li>
                                    </ul>
                                </div>

                                <div class="requirement-group">
                                    <h4>Persyaratan Khusus:</h4>
                                    <ul>
                                        <li>Surat rekomendasi dari atasan (jika sudah bekerja)</li>
                                        <li>Surat keterangan kerja dari perusahaan</li>
                                        <li>Portfolio pengalaman kerja (jika ada)</li>
                                        <li>Wawancara motivasi dan perencanaan karir</li>
                                    </ul>
                                </div>

                                <div class="requirement-group">
                                    <h4>Dokumen yang Diperlukan:</h4>
                                    <ul>
                                        <li>Pas foto terbaru (warna, ukuran 3x4 cm)</li>
                                        <li>Fotokopi ijazah yang telah dilegalisir</li>
                                        <li>Fotokopi KTP</li>
                                        <li>Surat keterangan kerja dari perusahaan</li>
                                        <li>Surat rekomendasi atasan (jika ada)</li>
                                        <li>CV/Resume terbaru</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Jadwal -->
                        <div class="schedule-section">
                            <h3><i class="fas fa-calendar-alt"></i> Jadwal Kuliah</h3>
                            <div class="schedule-options">
                                <div class="schedule-option">
                                    <h4><i class="fas fa-moon"></i> Kelas Malam Reguler</h4>
                                    <ul>
                                        <li>Senin - Jumat: 18:30 - 21:00 WIB</li>
                                        <li>3 hari pertemuan per minggu</li>
                                        <li>Satuan kredit per semester: 18-21 SKS</li>
                                    </ul>
                                </div>
                                <div class="schedule-option">
                                    <h4><i class="fas fa-calendar-day"></i> Kelas Weekend</h4>
                                    <ul>
                                        <li>Sabtu: 09:00 - 16:00 WIB</li>
                                        <li>Minggu: 09:00 - 16:00 WIB</li>
                                        <li>2 hari pertemuan per minggu</li>
                                        <li>Satuan kredit per semester: 18-21 SKS</li>
                                    </ul>
                                </div>
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
                                <i class="fas fa-clock"></i>
                                <div>
                                    <h5>Waktu Kuliah</h5>
                                    <p>Senin-Jumat, 18:30-21:00 WIB</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-calendar"></i>
                                <div>
                                    <h5>Lama Studi</h5>
                                    <p>8-10 semester (fleksibel)</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="info-card">
                            <h4>Kontak Pendaftaran</h4>
                            <ul>
                                <li><i class="fas fa-phone"></i> (+62) 813 9566 247</li>
                                <li><i class="fas fa-phone"></i> (+62) 878 6389 5222</li>
                                <li><i class="fas fa-envelope"></i> karyawan@umbk.ac.id</li>
                                <li><i class="fas fa-globe"></i> pmb.umbk.ac.id</li>
                            </ul>
                        </div>

                        <div class="cta-card">
                            <h4>Daftar Kelas Karyawan</h4>
                            <p>Tingkatkan karir Anda dengan pendidikan S1!</p>
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block">Daftar Sekarang</a>
                        </div>

                        <div class="info-card">
                            <h4>Jalur Lainnya</h4>
                            <ul>
                                <li><a href="{{ route('pendaftaran.reguler') }}">Jalur Reguler</a></li>
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

        .feature-section, .program-section, .requirement-section, .schedule-section {
            background: white;
            padding: 30px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border-left: 5px solid #A00000;
        }

        .feature-section h3, .program-section h3, .requirement-section h3, .schedule-section h3 {
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

        .programs-list {
            margin-top: 20px;
        }

        .program-item {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid #A00000;
        }

        .program-item h4 {
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

        .schedule-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .schedule-option {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #A00000;
        }

        .schedule-option h4 {
            color: #A00000;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .schedule-option ul {
            margin: 0;
            padding-left: 20px;
        }

        .schedule-option li {
            margin-bottom: 8px;
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
