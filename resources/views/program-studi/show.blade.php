@extends('layouts.landing')

@section('title', $program['nama'] . ' - UMBK')

@section('content')
<section class="page-header">
    <div class="container">
        <h1>{{ $program['nama'] }}</h1>
        <p>{{ $program['fakultas'] }}</p>
    </div>
</section>

<section class="program-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="program-content">
                    <div class="program-overview">
                        <h2>Tentang Program Studi</h2>
                        <p>{{ $program['deskripsi'] }}</p>
                        
                        <div class="program-meta">
                            <div class="meta-item">
                                <i class="fas fa-graduation-cap"></i>
                                <div>
                                    <strong>Jenjang:</strong> {{ $program['jenjang'] }}
                                </div>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <strong>Durasi:</strong> {{ $program['durasi'] }}
                                </div>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-certificate"></i>
                                <div>
                                    <strong>Akreditasi:</strong> {{ $program['akreditasi'] }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="program-vision-mission">
                        <h3>Visi</h3>
                        <p>{{ $program['visi'] }}</p>
                        
                        <h3>Misi</h3>
                        <ul>
                            @foreach($program['misi'] as $misi)
                            <li>{{ $misi }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="program-competencies">
                        <h3>Kompetensi Lulusan</h3>
                        <div class="competencies-grid">
                            @foreach($program['kompetensi'] as $kompetensi)
                            <div class="competency-item">
                                <i class="fas fa-check-circle"></i>
                                <span>{{ $kompetensi }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="program-careers">
                        <h3>Prospek Kerja</h3>
                        <div class="careers-grid">
                            @foreach($program['prospek_kerja'] as $career)
                            <div class="career-item">
                                <i class="fas fa-briefcase"></i>
                                <span>{{ $career }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="program-facilities">
                        <h3>Fasilitas</h3>
                        <div class="facilities-grid">
                            @foreach($program['fasilitas'] as $facility)
                            <div class="facility-item">
                                <i class="fas fa-building"></i>
                                <span>{{ $facility }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="program-sidebar">
                    <div class="sidebar-card">
                        <h4>Biaya Pendidikan</h4>
                        <div class="fee-list">
                            <div class="fee-item">
                                <span>Biaya Registrasi</span>
                                <strong>Rp {{ number_format($program['biaya']['registrasi'], 0, ',', '.') }}</strong>
                            </div>
                            <div class="fee-item">
                                <span>SPP per Bulan</span>
                                <strong>Rp {{ number_format($program['biaya']['spp_per_bulan'], 0, ',', '.') }}</strong>
                            </div>
                            <div class="fee-item">
                                <span>Biaya Prakuliah</span>
                                <strong>Rp {{ number_format($program['biaya']['prakuliah'], 0, ',', '.') }}</strong>
                            </div>
                            <div class="fee-item">
                                <span>Biaya per Semester</span>
                                <strong>Rp {{ number_format($program['biaya']['semester'], 0, ',', '.') }}</strong>
                            </div>
                        </div>
                        <div class="fee-note">
                            <small>*Biaya dapat berubah sewaktu-waktu</small>
                        </div>
                    </div>

                    <div class="sidebar-card">
                        <h4>Informasi Kontak</h4>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>(+62) 813 9566 247</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>(+62) 878 6389 5222</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-globe"></i>
                                <span>pmb.umbk.ac.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Karawang, Jawa Barat</span>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-card">
                        <h4>Aksi Cepat</h4>
                        <div class="action-buttons">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                            </a>
                            <a href="{{ route('pendaftaran.biaya') }}" class="btn btn-outline-primary btn-block">
                                <i class="fas fa-info-circle me-2"></i>Info Biaya
                            </a>
                            <a href="{{ route('landing') }}#program-studi" class="btn btn-outline-secondary btn-block">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Program Studi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related-programs">
    <div class="container">
        <h2 class="text-center">Program Studi Lainnya</h2>
        <div class="related-grid">
            <div class="related-card">
                <div class="related-icon"><i class="fas fa-bullhorn"></i></div>
                <h4>Ilmu Komunikasi</h4>
                <p>Fakultas Teknik dan Komunikasi</p>
                <a href="{{ route('program-studi.show', 'ilmu-komunikasi') }}" class="related-link">Lihat Detail</a>
            </div>
            <div class="related-card">
                <div class="related-icon"><i class="fas fa-balance-scale"></i></div>
                <h4>Ekonomi Islam</h4>
                <p>Fakultas Ekonomi dan Bisnis</p>
                <a href="{{ route('program-studi.show', 'ekonomi-islam') }}" class="related-link">Lihat Detail</a>
            </div>
            <div class="related-card">
                <div class="related-icon"><i class="fas fa-calculator"></i></div>
                <h4>Akuntansi</h4>
                <p>Fakultas Ekonomi dan Bisnis</p>
                <a href="{{ route('program-studi.show', 'akuntansi') }}" class="related-link">Lihat Detail</a>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
.page-header {
    background: linear-gradient(135deg, #A00000 0%, #800000 100%);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.page-header h1 {
    font-size: 3rem;
    margin-bottom: 10px;
}

.page-header p {
    font-size: 1.2rem;
    opacity: 0.9;
}

.program-detail {
    padding: 80px 0;
}

.program-content h2 {
    color: #A00000;
    margin-bottom: 20px;
    font-size: 2rem;
}

.program-content h3 {
    color: #333;
    margin-bottom: 15px;
    font-size: 1.5rem;
}

.program-overview p {
    font-size: 1.1rem;
    line-height: 1.8;
    margin-bottom: 30px;
}

.program-meta {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.meta-item {
    display: flex;
    align-items: center;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 10px;
}

.meta-item i {
    color: #A00000;
    font-size: 1.5rem;
    margin-right: 15px;
}

.program-vision-mission {
    margin-bottom: 40px;
}

.program-vision-mission p {
    font-size: 1.1rem;
    line-height: 1.8;
    margin-bottom: 20px;
}

.program-vision-mission ul {
    list-style: none;
    padding: 0;
}

.program-vision-mission li {
    padding: 10px 0;
    padding-left: 30px;
    position: relative;
}

.program-vision-mission li:before {
    content: "✓";
    color: #A00000;
    position: absolute;
    left: 0;
    font-weight: bold;
}

.competencies-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-bottom: 40px;
}

.competency-item {
    display: flex;
    align-items: center;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

.competency-item i {
    color: #28a745;
    margin-right: 10px;
}

.careers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-bottom: 40px;
}

.career-item {
    display: flex;
    align-items: center;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

.career-item i {
    color: #A00000;
    margin-right: 10px;
}

.facilities-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
}

.facility-item {
    display: flex;
    align-items: center;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

.facility-item i {
    color: #17a2b8;
    margin-right: 10px;
}

.program-sidebar {
    position: sticky;
    top: 20px;
}

.sidebar-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.sidebar-card h4 {
    color: #333;
    margin-bottom: 20px;
    font-size: 1.2rem;
}

.fee-list {
    margin-bottom: 15px;
}

.fee-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #eee;
}

.fee-item:last-child {
    border-bottom: none;
}

.fee-item strong {
    color: #A00000;
}

.fee-note {
    text-align: center;
    color: #666;
    margin-top: 15px;
}

.contact-info {
    margin-bottom: 20px;
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.contact-item i {
    color: #A00000;
    margin-right: 15px;
    width: 20px;
}

.action-buttons {
    margin-bottom: 20px;
}

.btn-block {
    display: block;
    width: 100%;
    margin-bottom: 10px;
    text-align: center;
    padding: 12px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary {
    background: #A00000;
    color: white;
    border: none;
}

.btn-primary:hover {
    background: #800000;
    transform: translateY(-2px);
}

.btn-outline-primary {
    background: transparent;
    color: #A00000;
    border: 2px solid #A00000;
}

.btn-outline-primary:hover {
    background: #A00000;
    color: white;
}

.btn-outline-secondary {
    background: transparent;
    color: #666;
    border: 2px solid #666;
}

.btn-outline-secondary:hover {
    background: #666;
    color: white;
}

.related-programs {
    padding: 60px 0;
    background: #f8f9fa;
}

.related-programs h2 {
    color: #333;
    margin-bottom: 40px;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.related-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.related-card:hover {
    transform: translateY(-5px);
}

.related-icon {
    width: 60px;
    height: 60px;
    background: #A00000;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    font-size: 1.5rem;
}

.related-card h4 {
    color: #333;
    margin-bottom: 10px;
}

.related-card p {
    color: #666;
    margin-bottom: 20px;
}

.related-link {
    color: #A00000;
    text-decoration: none;
    font-weight: 600;
}

.related-link:hover {
    text-decoration: underline;
}

@media (max-width: 992px) {
    .page-header h1 {
        font-size: 2.5rem;
    }
    
    .program-detail {
        padding: 60px 0;
    }
    
    .program-content h2 {
        font-size: 1.8rem;
    }
    
    .program-content h3 {
        font-size: 1.3rem;
    }
    
    .program-meta {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .competencies-grid,
    .careers-grid,
    .facilities-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .related-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .page-header {
        padding: 60px 0;
    }
    
    .page-header h1 {
        font-size: 2rem;
    }
    
    .page-header p {
        font-size: 1rem;
    }
    
    .program-detail {
        padding: 60px 0;
    }
    
    .program-content h2 {
        font-size: 1.6rem;
        margin-bottom: 15px;
    }
    
    .program-content h3 {
        font-size: 1.2rem;
        margin-bottom: 12px;
    }
    
    .program-overview p {
        font-size: 1rem;
        margin-bottom: 25px;
    }
    
    .program-meta {
        grid-template-columns: 1fr;
        gap: 12px;
        margin-bottom: 30px;
    }
    
    .meta-item {
        padding: 12px;
    }
    
    .meta-item i {
        font-size: 1.3rem;
        margin-right: 12px;
    }
    
    .program-vision-mission {
        margin-bottom: 30px;
    }
    
    .program-vision-mission p {
        font-size: 1rem;
        margin-bottom: 15px;
    }
    
    .competencies-grid,
    .careers-grid,
    .facilities-grid {
        grid-template-columns: 1fr;
        gap: 12px;
        margin-bottom: 30px;
    }
    
    .competency-item,
    .career-item,
    .facility-item {
        padding: 12px;
    }
    
    .program-sidebar {
        position: static;
        margin-top: 40px;
    }
    
    .sidebar-card {
        padding: 20px;
        margin-bottom: 15px;
    }
    
    .sidebar-card h4 {
        font-size: 1.1rem;
        margin-bottom: 15px;
    }
    
    .fee-item {
        padding: 10px 0;
        font-size: 0.9rem;
    }
    
    .fee-item strong {
        font-size: 0.95rem;
    }
    
    .contact-item {
        margin-bottom: 12px;
        font-size: 0.9rem;
    }
    
    .btn-block {
        padding: 10px 15px;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }
    
    .related-programs {
        padding: 40px 0;
    }
    
    .related-programs h2 {
        font-size: 1.6rem;
        margin-bottom: 30px;
    }
    
    .related-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .related-card {
        padding: 20px;
    }
    
    .related-icon {
        width: 50px;
        height: 50px;
        font-size: 1.3rem;
        margin-bottom: 15px;
    }
    
    .related-card h4 {
        font-size: 1.1rem;
        margin-bottom: 8px;
    }
    
    .related-card p {
        font-size: 0.9rem;
        margin-bottom: 15px;
    }
}

@media (max-width: 576px) {
    .page-header {
        padding: 40px 0;
    }
    
    .page-header h1 {
        font-size: 1.8rem;
    }
    
    .program-detail {
        padding: 40px 0;
    }
    
    .program-content h2 {
        font-size: 1.4rem;
    }
    
    .program-content h3 {
        font-size: 1.1rem;
    }
    
    .program-overview p {
        font-size: 0.95rem;
    }
    
    .program-vision-mission p {
        font-size: 0.95rem;
    }
    
    .meta-item {
        padding: 10px;
        flex-direction: column;
        text-align: center;
        gap: 8px;
    }
    
    .meta-item i {
        margin-right: 0;
    }
    
    .sidebar-card {
        padding: 15px;
    }
    
    .sidebar-card h4 {
        font-size: 1rem;
    }
    
    .fee-item {
        padding: 8px 0;
        font-size: 0.85rem;
    }
    
    .fee-item strong {
        font-size: 0.9rem;
    }
    
    .contact-item {
        font-size: 0.85rem;
    }
    
    .btn-block {
        padding: 8px 12px;
        font-size: 0.85rem;
    }
    
    .related-programs {
        padding: 30px 0;
    }
    
    .related-programs h2 {
        font-size: 1.4rem;
    }
    
    .related-card {
        padding: 15px;
    }
    
    .related-icon {
        width: 40px;
        height: 40px;
        font-size: 1.1rem;
    }
    
    .related-card h4 {
        font-size: 1rem;
    }
    
    .related-card p {
        font-size: 0.85rem;
    }
}

/* Tablet Landscape */
@media (min-width: 769px) and (max-width: 992px) {
    .competencies-grid,
    .careers-grid,
    .facilities-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .related-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Large Tablets */
@media (min-width: 993px) and (max-width: 1200px) {
    .competencies-grid,
    .careers-grid,
    .facilities-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .related-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Landscape Mobile */
@media (max-width: 768px) and (orientation: landscape) {
    .page-header {
        padding: 30px 0;
    }
    
    .page-header h1 {
        font-size: 1.6rem;
    }
    
    .program-detail {
        padding: 30px 0;
    }
    
    .program-meta {
        grid-template-columns: repeat(3, 1fr);
    }
}
</style>
