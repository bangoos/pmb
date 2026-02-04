@extends('layouts.landing')

@section('title', 'Tentang Kami - UMBK')

@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background: #A00000; padding: 40px 0; text-align: center; color: white;">
        <div class="container">
            <h1 style="font-size: 2.5rem; font-weight: 700;">Tentang UMBK</h1>
            <p>Universitas Muhammadiyah Bekasi Karawang - Kampus Berkemajuan</p>
        </div>
    </section>

    <!-- Tentang UMBK -->
    <section class="about-section" style="padding: 60px 0; background: #fff;">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2 class="section-title">Universitas Muhammadiyah Bekasi Karawang</h2>
                    <p class="lead-text">Universitas Muhammadiyah Bekasi Karawang (UMBK) merupakan hasil transformasi kelembagaan dari Institut Bisnis Muhammadiyah Bekasi (IBMB).</p>
                    <p>Lahir dari komitmen Persyarikatan Muhammadiyah dalam mengembangkan pendidikan tinggi yang unggul, berdaya saing, dan berlandaskan nilai-nilai Islam berkemajuan. Kami mengusung semangat <strong>"Global Entrepreneur Campus"</strong> untuk mencetak lulusan yang tidak hanya cerdas secara akademis, tetapi juga memiliki jiwa kewirausahaan dan karakter yang kuat.</p>
                    
                    <div class="about-stats">
                        <div class="stat-item">
                            <span class="stat-number">7</span>
                            <span class="stat-label">Program Studi</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">Baik</span>
                            <span class="stat-label">Akreditasi</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">2</span>
                            <span class="stat-label">Fakultas</span>
                        </div>
                    </div>
                </div>
                <div class="about-image">
                    <img src="{{ url('images/building.png') }}" alt="Gedung Kampus UMBK" class="rounded-shadow img-responsive">
                </div>
            </div>
        </div>
    </section>

    <!-- Why UMBK -->
    <section class="why-umbk" style="padding: 60px 0; background: #f9f9f9;">
        <div class="container">
            <h2 class="section-title text-center">Mengapa kuliah di UMBK..?</h2>
            <div class="why-content">
                <div class="why-image">
                    <img src="{{ url('images/building.png') }}" alt="Gedung UMBK" class="rounded-img img-responsive">
                </div>
                <div class="why-list">
                    <div class="why-item">
                        <i class="fas fa-certificate"></i>
                        <div>
                            <h4>Akreditasi "BAIK"</h4>
                            <p>Kampus dan Seluruh Program Studi telah Terakreditasi "BAIK" oleh BAN-PT dan LAM.</p>
                        </div>
                    </div>
                    <div class="why-item">
                        <i class="fas fa-chart-line"></i>
                        <div>
                            <h4>Kurikulum Berkemajuan</h4>
                            <p>Kurikulum terintegrasi dengan kebutuhan industri, perkembangan teknologi, dan kemajuan ilmu pengetahuan.</p>
                        </div>
                    </div>
                    <div class="why-item">
                        <i class="fas fa-globe"></i>
                        <div>
                            <h4>Jaringan yang Luas</h4>
                            <p>UMBK memiliki jaringan nasional dan internasional yang dimiliki oleh Muhammadiyah sebagai instrumen pengembangan perguruan tinggi.</p>
                        </div>
                    </div>
                    <div class="why-item">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>
                            <h4>Dosen Profesional</h4>
                            <p>Tenaga Pengajar memiliki kompetensi sesuai dengan capaian program studi dalam bidang pendidikan, penelitian, dan pengabdian kepada masyarakat.</p>
                        </div>
                    </div>
                    <div class="why-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Lokasi Strategis</h4>
                            <p>UMBK berada di jalan nasional (Interchange Tol Karawang Barat), berada di pusat perkantoran, perekonomian, dan kawasan industri terbesar se-Asia Tenggara.</p>
                        </div>
                    </div>
                    <div class="why-item">
                        <i class="fas fa-building"></i>
                        <div>
                            <h4>Sarana Prasarana Lengkap</h4>
                            <p>Pembelajaran didukung dengan sarana dan prasarana yang lengkap sebagai fasilitas penunjang pendidikan.</p>
                        </div>
                    </div>
                    <div class="why-item">
                        <i class="fas fa-hand-holding-usd"></i>
                        <div>
                            <h4>Tersedia Pilihan Beasiswa</h4>
                            <p>Beasiswa menjadi instrumen penting sebagai bentuk kontribusi UMBK untuk memudahkan akses perkuliahan bagi seluruh kalangan masyarakat.</p>
                        </div>
                    </div>
                    <div class="why-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Fleksibilitas Jadwal Kuliah</h4>
                            <p>Proses perkuliahan fleksibel, jadwal kuliah dapat disesuaikan dengan jam kerja perkantoran maupun industri.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi -->
    <section class="vision-mission" style="padding: 60px 0; background: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="vision-box">
                        <h3><i class="fas fa-eye"></i> Visi</h3>
                        <p>Menjadi universitas unggul dan berkemajuan dalam menghasilkan lulusan yang profesional, entrepreneur, dan berakhlak mulia berlandaskan nilai-nilai Islam.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mission-box">
                        <h3><i class="fas fa-bullseye"></i> Misi</h3>
                        <ul>
                            <li>Menyelenggarakan pendidikan tinggi yang berkualitas dan relevan dengan kebutuhan zaman</li>
                            <li>Mengembangkan penelitian yang inovatif dan bermanfaat bagi masyarakat</li>
                            <li>Melaksanakan pengabdian kepada masyarakat yang berkelanjutan</li>
                            <li>Membangun jaringan kerjasama dengan institusi nasional dan internasional</li>
                            <li>Menumbuhkembangkan jiwa wirausaha dan kemandirian mahasiswa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fakultas -->
    <section class="faculties" style="padding: 60px 0; background: #f9f9f9;">
        <div class="container">
            <h2 class="section-title text-center">Fakultas dan Program Studi</h2>
            <div class="faculties-grid">
                <div class="faculty-card">
                    <div class="faculty-header">
                        <i class="fas fa-briefcase"></i>
                        <h3>Fakultas Ekonomi dan Bisnis</h3>
                    </div>
                    <div class="faculty-programs">
                        <h4>Program Studi:</h4>
                        <ul>
                            <li>Manajemen (S1)</li>
                            <li>Akuntansi (S1)</li>
                            <li>Ekonomi Islam (S1)</li>
                        </ul>
                    </div>
                </div>
                
                <div class="faculty-card">
                    <div class="faculty-header">
                        <i class="fas fa-laptop-code"></i>
                        <h3>Fakultas Teknik dan Komunikasi</h3>
                    </div>
                    <div class="faculty-programs">
                        <h4>Program Studi:</h4>
                        <ul>
                            <li>Teknik Informatika (S1)</li>
                            <li>Teknik Industri (S1)</li>
                            <li>Sains Data (S1)</li>
                            <li>Ilmu Komunikasi (S1)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership -->
    <section class="leadership" style="padding: 60px 0; background: #fff;">
        <div class="container">
            <h2 class="section-title text-center">Pimpinan Universitas</h2>
            <div class="leadership-grid">
                <div class="leader-card">
                    <div class="leader-image">
                        <img src="{{ url('images/placeholder-leader.jpg') }}" alt="Rektor" class="img-responsive">
                    </div>
                    <div class="leader-info">
                        <h4>Prof. Dr. H. Ahmad Syafi'i, M.Si.</h4>
                        <p class="leader-position">Rektor</p>
                        <p class="leader-description">Memiliki pengalaman lebih dari 20 tahun dalam bidang pendidikan tinggi dan manajemen.</p>
                    </div>
                </div>
                
                <div class="leader-card">
                    <div class="leader-image">
                        <img src="{{ url('images/placeholder-leader.jpg') }}" alt="Warek I" class="img-responsive">
                    </div>
                    <div class="leader-info">
                        <h4>Dr. H. Budi Santoso, S.E., M.M.</h4>
                        <p class="leader-position">Wakil Rektor I</p>
                        <p class="leader-description">Bidang Akademik dan Kemahasiswaan dengan fokus pada pengembangan kurikulum.</p>
                    </div>
                </div>
                
                <div class="leader-card">
                    <div class="leader-image">
                        <img src="{{ url('images/placeholder-leader.jpg') }}" alt="Warek II" class="img-responsive">
                    </div>
                    <div class="leader-info">
                        <h4>Dr. Ir. H. Muhammad Yusuf, M.T.</h4>
                        <p class="leader-position">Wakil Rektor II</p>
                        <p class="leader-description">Bidang Administrasi Umum, Keuangan, dan Sumber Daya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .section-title {
            font-size: 2rem;
            color: #A00000;
            font-style: italic;
            margin-bottom: 40px;
            position: relative;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .about-content .lead-text {
            font-size: 1.1rem;
            color: #A00000;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .about-content p {
            margin-bottom: 20px;
            color: #555;
            line-height: 1.8;
        }

        .about-stats {
            display: flex;
            gap: 40px;
            margin-top: 30px;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #A00000;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #666;
            font-weight: 600;
        }

        .about-image img.rounded-shadow {
            width: 100%;
            border-radius: 20px;
            box-shadow: 20px 20px 0 #f0f0f0;
        }

        .why-content {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
            align-items: stretch;
        }

        .why-image {
            flex: 1;
            min-width: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .why-image img {
            width: 100%;
            height: 100%;
            min-height: 500px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .why-list {
            flex: 1;
            min-width: 300px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .why-item {
            display: flex;
            gap: 15px;
            align-items: flex-start;
        }

        .why-item i {
            font-size: 1.5rem;
            color: #A00000;
            width: 30px;
            text-align: center;
        }

        .why-item h4 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .why-item p {
            font-size: 0.9rem;
            color: #666;
        }

        .vision-box, .mission-box {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 15px;
            height: 100%;
            border-left: 5px solid #A00000;
        }

        .vision-box h3, .mission-box h3 {
            color: #A00000;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .vision-box p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }

        .mission-box ul {
            list-style: none;
            padding: 0;
        }

        .mission-box li {
            margin-bottom: 12px;
            padding-left: 25px;
            position: relative;
        }

        .mission-box li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #A00000;
            font-weight: bold;
        }

        .faculties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .faculty-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
            border-top: 5px solid #A00000;
        }

        .faculty-header {
            background: #A00000;
            color: white;
            padding: 25px;
            text-align: center;
        }

        .faculty-header i {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .faculty-header h3 {
            margin: 0;
            font-size: 1.3rem;
        }

        .faculty-programs {
            padding: 25px;
        }

        .faculty-programs h4 {
            color: #A00000;
            margin-bottom: 15px;
        }

        .faculty-programs ul {
            list-style: none;
            padding: 0;
        }

        .faculty-programs li {
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .faculty-programs li:last-child {
            border-bottom: none;
        }

        .leadership-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .leader-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
            text-align: center;
        }

        .leader-image {
            height: 250px;
            overflow: hidden;
            background: #f0f0f0;
        }

        .leader-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .leader-info {
            padding: 25px;
        }

        .leader-info h4 {
            color: #A00000;
            margin-bottom: 5px;
        }

        .leader-position {
            color: #666;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .leader-description {
            font-size: 0.9rem;
            color: #555;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .about-grid {
                grid-template-columns: 1fr;
            }
            
            .about-image {
                order: -1;
            }

            .why-content {
                flex-direction: column;
            }

            .faculties-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection
