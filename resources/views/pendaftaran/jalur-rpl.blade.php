@extends('layouts.landing')

@section('title', 'Jalur Pendaftaran RPL - PMB UMBK')

@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background: #A00000; padding: 40px 0; text-align: center; color: white;">
        <div class="container">
            <h1 style="font-size: 2.5rem; font-weight: 700;">Jalur Pendaftaran RPL</h1>
            <p>Rekognisi Pembelajaran Lampau untuk percepatan studi</p>
        </div>
    </section>

    <!-- Jalur RPL Content -->
    <section class="jalur-content" style="padding: 60px 0; background: #f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="jalur-info">
                        <h2>Tentang Program RPL</h2>
                        <p>Rekognisi Pembelajaran Lampau (RPL) adalah jalur pendaftaran yang memungkinkan mahasiswa dengan pengalaman kerja atau pendidikan informal untuk mendapatkan pengakuan kredit kuliah. Program ini dirancang untuk mempercepat masa studi dengan mengakui pembelajaran yang telah diperoleh.</p>

                        <!-- Keunggulan -->
                        <div class="feature-section">
                            <h3><i class="fas fa-star"></i> Keunggulan Program RPL</h3>
                            <div class="features-grid">
                                <div class="feature-item">
                                    <i class="fas fa-rocket"></i>
                                    <h4>Percepatan Studi</h4>
                                    <p>Masa studi lebih singkat (4-6 semester)</p>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-coins"></i>
                                    <h4>Efisien Biaya</h4>
                                    <p>Biaya kuliah lebih hemat dengan SKS yang dikurangi</p>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-certificate"></i>
                                    <h4>Pengakuan Kompetensi</h4>
                                    <p>Pengalaman kerja diakui sebagai kredit kuliah</p>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-briefcase"></i>
                                    <h4>Fleksibel</h4>
                                    <p>Cocok untuk profesional yang sudah bekerja</p>
                                </div>
                            </div>
                        </div>

                        <!-- Program Studi -->
                        <div class="program-section">
                            <h3><i class="fas fa-graduation-cap"></i> Program Studi RPL Tersedia</h3>
                            <div class="programs-list">
                                <div class="program-item">
                                    <h4>Manajemen (S1)</h4>
                                    <p>Dari pengalaman manajerial, supervisi, atau kepemimpinan minimal 3 tahun.</p>
                                </div>
                                <div class="program-item">
                                    <h4>Akuntansi (S1)</h4>
                                    <p>Dari pengalaman di bidang akuntansi, keuangan, atau audit minimal 3 tahun.</p>
                                </div>
                                <div class="program-item">
                                    <h4>Teknik Informatika (S1)</h4>
                                    <p>Dari pengalaman programming, IT support, atau development minimal 3 tahun.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Persyaratan -->
                        <div class="requirement-section">
                            <h3><i class="fas fa-list-check"></i> Persyaratan Pendaftaran</h3>
                            <div class="requirements">
                                <div class="requirement-group">
                                    <h4>Persyaratan Pendidikan:</h4>
                                    <ul>
                                        <li>Lulusan SMA/SMK/MA atau sederajat</li>
                                        <li>Lulusan D3 dapat mengajukan konversi ke S1</li>
                                        <li>Usia minimal 25 tahun</li>
                                        <li>Memiliki pengalaman kerja minimal 3 tahun</li>
                                    </ul>
                                </div>

                                <div class="requirement-group">
                                    <h4>Persyaratan Pengalaman:</h4>
                                    <ul>
                                        <li>Pengalaman kerja relevan dengan program studi yang dipilih</li>
                                        <li>Surat keterangan kerja dari perusahaan</li>
                                        <li>Portfolio karya atau proyek yang pernah dikerjakan</li>
                                        <li>Sertifikat pelatihan atau kursus (jika ada)</li>
                                        <li>Bukti prestasi atau penghargaan terkait pekerjaan</li>
                                    </ul>
                                </div>

                                <div class="requirement-group">
                                    <h4>Dokumen yang Diperlukan:</h4>
                                    <ul>
                                        <li>Pas foto terbaru (warna, ukuran 3x4 cm)</li>
                                        <li>Fotokopi ijazah terakhir yang dilegalisir</li>
                                        <li>Fotokopi KTP</li>
                                        <li>CV/Resume lengkap dengan deskripsi pekerjaan</li>
                                        <li>Surat keterangan kerja dari perusahaan</li>
                                        <li>Portfolio atau portofolio karya</li>
                                        <li>Sertifikat pelatihan/kursus</li>
                                        <li>Surat rekomendasi dari atasan atau mentor</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Proses RPL -->
                        <div class="process-section">
                            <h3><i class="fas fa-cogs"></i> Proses RPL</h3>
                            <div class="process-steps">
                                <div class="step-item">
                                    <div class="step-number">1</div>
                                    <div class="step-content">
                                        <h4>Registrasi Awal</h4>
                                        <p>Mendaftar dan mengumpulkan dokumen persyaratan</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">2</div>
                                    <div class="step-content">
                                        <h4>Assessment Portofolio</h4>
                                        <p>Tim assesor mengevaluasi pengalaman dan kompetensi</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">3</div>
                                    <div class="step-content">
                                        <h4>Wawancara Kompetensi</h4>
                                        <p>Wawancara mendalam untuk validasi pembelajaran</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">4</div>
                                    <div class="step-content">
                                        <h4>Penentuan Kredit</h4>
                                        <p>Penetapan SKS yang diakui melalui RPL</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">5</div>
                                    <div class="step-content">
                                        <h4>Perencanaan Studi</h4>
                                        <p>Penyusunan rencana studi yang disesuaikan</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Biaya -->
                        <div class="biaya-section">
                            <h3><i class="fas fa-money-bill-wave"></i> Biaya Program RPL</h3>
                            <div class="biaya-info">
                                <div class="cost-item">
                                    <h4>Biaya Pendaftaran</h4>
                                    <p>Rp 500.000 (termasuk assessment portofolio)</p>
                                </div>
                                <div class="cost-item">
                                    <h4>Biaya Assessment RPL</h4>
                                    <p>Rp 1.500.000 (sekali untuk proses evaluasi)</p>
                                </div>
                                <div class="cost-item">
                                    <h4>Biaya Kuliah per SKS</h4>
                                    <p>Rp 250.000/SKS (hanya untuk SKS yang ditempuh)</p>
                                </div>
                                <div class="cost-item">
                                    <h4>Perkiraan Total Biaya</h4>
                                    <p>Rp 15.000.000 - 25.000.000 (tergantung SKS yang diakui)</p>
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
                                <i class="fas fa-clock"></i>
                                <div>
                                    <h5>Lama Studi</h5>
                                    <p>4-6 semester (tergantung RPL)</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-star"></i>
                                <div>
                                    <h5>Maksimal SKS RPL</h5>
                                    <p>Hingga 60 SKS dapat diakui</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-certificate"></i>
                                <div>
                                    <h5>Ijasah Sama</h5>
                                    <p>Sama dengan jalur reguler</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="info-card">
                            <h4>Kontak RPL</h4>
                            <ul>
                                <li><i class="fas fa-phone"></i> (+62) 813 9566 247</li>
                                <li><i class="fas fa-phone"></i> (+62) 878 6389 5222</li>
                                <li><i class="fas fa-envelope"></i> rpl@umbk.ac.id</li>
                                <li><i class="fas fa-globe"></i> pmb.umbk.ac.id</li>
                            </ul>
                        </div>

                        <div class="cta-card">
                            <h4>Daftar Program RPL</h4>
                            <p>Percepat studi Anda dengan RPL!</p>
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block">Daftar Sekarang</a>
                        </div>

                        <div class="info-card">
                            <h4>Jalur Lainnya</h4>
                            <ul>
                                <li><a href="{{ route('pendaftaran.reguler') }}">Jalur Reguler</a></li>
                                <li><a href="{{ route('pendaftaran.kelas-karyawan') }}">Jalur Kelas Karyawan</a></li>
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

        .feature-section, .program-section, .requirement-section, .process-section, .biaya-section {
            background: white;
            padding: 30px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border-left: 5px solid #A00000;
        }

        .feature-section h3, .program-section h3, .requirement-section h3, .process-section h3, .biaya-section h3 {
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

        .process-steps {
            margin-top: 20px;
        }

        .step-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .step-number {
            min-width: 40px;
            height: 40px;
            background: #A00000;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .step-content h4 {
            color: #A00000;
            margin-bottom: 5px;
        }

        .biaya-info {
            margin-top: 20px;
        }

        .cost-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid #A00000;
        }

        .cost-item h4 {
            color: #A00000;
            margin-bottom: 5px;
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
