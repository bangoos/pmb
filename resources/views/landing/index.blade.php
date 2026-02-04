@extends('layouts.landing')

@section('title', 'Penerimaan Mahasiswa Baru - UMBK')

@section('content')
    <section class="hero">
        <div class="hero-slider">
            <div class="hero-slide active">
                <div class="container hero-container">
                    <div class="hero-text">
                        <h1>Penerimaan<br><span class="highlight-red">Mahasiswa Baru</span></h1>
                        <p class="subtitle">Universitas Muhammadiyah Bekasi Karawang<br>Tahun Akademik 2026/2027</p>
                        <div class="tagline">
                            <span class="quote-mark">"</span> Maju Bersama <span class="bold-italic">UMBK</span>
                        </div>
                    </div>
                    <div class="hero-image">
                        <img src="{{ url('images/hero1.png') }}" alt="Mahasiswa UMBK" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="hero-slide">
                <div class="container hero-container">
                    <div class="hero-text">
                        <h1>Raih Impian<br><span class="highlight-red">Masa Depan</span></h1>
                        <p class="subtitle">Bersama Kampus Berkemajuan<br>Universitas Muhammadiyah Bekasi Karawang</p>
                        <div class="tagline">
                            <span class="quote-mark">"</span> Kampus <span class="bold-italic">Berkemajuan</span>
                        </div>
                    </div>
                    <div class="hero-image">
                        <img src="{{ url('images/hero2.png') }}" alt="Mahasiswa UMBK" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="quick-links">
        <div class="container">
            <div class="links-grid">
                <div class="link-card">
                    <a href="{{ route('program-studi.index') }}">
                        <i class="fas fa-laptop-code"></i>
                        <h3>Program Studi</h3>
                    </a>
                </div>
                <div class="link-card"><i class="fas fa-book"></i><h3>Kurikulum</h3></div>
                <div class="link-card"><i class="fas fa-users"></i><h3>Jalur Pendaftaran</h3></div>
                <div class="link-card"><i class="fas fa-book-open"></i><h3>Brosur Elektronik</h3></div>
                <div class="link-card active">
                    <i class="fas fa-file-signature"></i>
                    <h3><a href="{{ route('register') }}">Daftar Sekarang</a></h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Why UMBK -->
    <section class="why-umbk">
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

    <section class="study-programs" id="program-studi">
        <div class="container">
            <h2 class="section-title text-center">Program Studi</h2>
            <div class="programs-grid">
                <div class="program-card">
                    <div class="program-icon"><i class="fas fa-laptop-code"></i></div>
                    <h3>Teknik Informatika</h3>
                    <p>Fakultas Teknik dan Komunikasi. Mempelajari rekayasa perangkat lunak, jaringan komputer, dan kecerdasan buatan.</p>
                    <a href="{{ route('program-studi.show', 'teknik-informatika') }}" class="program-link">Lihat Detail ⟶</a>
                </div>
                <div class="program-card">
                    <div class="program-icon"><i class="fas fa-bullhorn"></i></div>
                    <h3>Ilmu Komunikasi</h3>
                    <p>Fakultas Teknik dan Komunikasi. Mengembangkan kemampuan komunikasi digital, jurnalistik, dan public relations.</p>
                    <a href="{{ route('program-studi.show', 'ilmu-komunikasi') }}" class="program-link">Lihat Detail ⟶</a>
                </div>
                <div class="program-card">
                    <div class="program-icon"><i class="fas fa-balance-scale"></i></div>
                    <h3>Ekonomi Islam</h3>
                    <p>Fakultas Ekonomi dan Bisnis. Mempelajari sistem ekonomi berbasis syariah dan perbankan syariah.</p>
                    <a href="{{ route('program-studi.show', 'ekonomi-islam') }}" class="program-link">Lihat Detail ⟶</a>
                </div>
                <div class="program-card">
                    <div class="program-icon"><i class="fas fa-chart-line"></i></div>
                    <h3>Ekonomi Pembangunan</h3>
                    <p>Fakultas Ekonomi dan Bisnis. Analisis kebijakan ekonomi dan perencanaan pembangunan.</p>
                    <a href="{{ route('program-studi.show', 'ekonomi-pembangunan') }}" class="program-link">Lihat Detail ⟶</a>
                </div>
                <div class="program-card">
                    <div class="program-icon"><i class="fas fa-calculator"></i></div>
                    <h3>Akuntansi</h3>
                    <p>Fakultas Ekonomi dan Bisnis. Menghasilkan akuntan profesional yang kompeten.</p>
                    <a href="{{ route('program-studi.show', 'akuntansi') }}" class="program-link">Lihat Detail ⟶</a>
                </div>
                <div class="program-card">
                    <div class="program-icon"><i class="fas fa-briefcase"></i></div>
                    <h3>Manajemen</h3>
                    <p>Fakultas Ekonomi dan Bisnis. Mencetak lulusan profesional di bidang bisnis, SDM, pemasaran.</p>
                    <a href="{{ route('program-studi.show', 'manajemen') }}" class="program-link">Lihat Detail ⟶</a>
                </div>
                <div class="program-card">
                    <div class="program-icon"><i class="fas fa-brain"></i></div>
                    <h3>Psikologi</h3>
                    <p>Fakultas Ilmu Sosial dan Humaniora. Mempelajari perilaku manusia, kesehatan mental, dan pengembangan potensi.</p>
                    <a href="{{ route('program-studi.show', 'psikologi') }}" class="program-link">Lihat Detail ⟶</a>
                </div>
            </div>
        </div>
    </section>

    <section class="tuition-fees" id="biaya">
        <div class="container">
            <h2 class="section-title text-center">Biaya Kuliah Terjangkau</h2>
            <div class="fees-content text-center">
                <p class="lead-text">UMBK berkomitmen memberikan pendidikan berkualitas dengan biaya yang terjangkau.</p>
                <div class="fees-features">
                    <div class="fee-item">
                        <i class="fas fa-money-bill-wave"></i>
                        <h4>Biaya Terjangkau</h4>
                        <p>Mulai dari Rp 400.000,- / bulan</p>
                    </div>
                    <div class="fee-item">
                        <i class="fas fa-hand-holding-usd"></i>
                        <h4>Cicilan Ringan</h4>
                        <p>Dapat dicicil per bulan atau per semester</p>
                    </div>
                    <div class="fee-item">
                        <i class="fas fa-graduation-cap"></i>
                        <h4>Banyak Beasiswa</h4>
                        <p>Tersedia berbagai pilihan beasiswa</p>
                    </div>
                </div>
                <div class="fees-action">
                    <a href="{{ route('register') }}" class="btn btn-primary"><i class="fas fa-file-signature"></i> Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-bar">
        <div class="container">
            <h2><a href="{{ route('register') }}">DAFTAR SEKARANG</a></h2>
        </div>
    </section>

    <section class="flow" id="alur-pendaftaran">
        <div class="container">
            <h2 class="section-title text-center">Alur Pendaftaran</h2>
            <div class="flow-image-container">
                <img src="{{ url('images/alur-pendaftaran.png') }}" alt="Alur Pendaftaran" class="img-responsive">
            </div>
        </div>
    </section>

    <section class="cta-bar">
        <div class="container">
            <h2><a href="{{ route('register') }}">DAFTAR SEKARANG</a></h2>
        </div>
    </section>

    <section class="info-contact">
        <div class="container">
            <h2 class="section-title text-center">Informasi Lebih Lanjut Hubungi Kami</h2>
            <div class="info-grid">
                <div class="info-box location">
                    <h4>Lokasi Kampus UMBK :</h4>
                    <p>Jl. Interchange Tol Karawang Barat, Desa Wadas, Kec. Telukjambe Timur, Kab. Karawang</p>
                    <div class="map-placeholder">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.703273445832!2d107.27218327423377!3d-6.302656961683452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69797b968ba491%3A0x5fda37ca38ad4321!2sUniversitas%20Muhammadiyah%20Bekasi%20Karawang%20(UMBK)!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="info-box schedule">
                    <h4>Jadwal Pendaftaran :</h4>
                    <ul class="timeline-list">
                        <li><strong>Gelombang 1</strong> : 1 Desember s/d 31 Maret</li>
                        <li><strong>Gelombang 2</strong> : 1 April s/d 30 Juni</li>
                        <li><strong>Gelombang 3</strong> : 1 Juli s/d 30 September</li>
                    </ul>
                    <div class="admin-contact">
                        <i class="fas fa-headset"></i>
                        <div>
                            <strong>Admin PMB :</strong><br>
                            (+62) 813 9566 247<br>
                            (+62) 878 6389 5222<br>
                            <a href="https://pmb.umbk.ac.id">pmb.umbk.ac.id</a>
                        </div>
                    </div>
                </div>
                <div class="info-box qr-section">
                    <p><strong>Link Tree UMBK</strong></p>
                    <br><br>
                    <img src="{{ url('images/qr-code.png') }}" alt="Scan Me" class="qr-img">
                </div>
            </div>
        </div>
    </section>

    <section class="cta-bar">
        <div class="container">
            <h2><a href="{{ route('register') }}">DAFTAR SEKARANG</a></h2>
        </div>
    </section>

    <section class="partners">
        <div class="container">
            <h2 class="section-title text-center">Kerja Sama UMBK</h2>
            <div class="flow-image-container">
                <img src="{{ url('images/mitra.png') }}" alt="Partner" class="img-responsive">
            </div>
        </div>
    </section>
@endsection
