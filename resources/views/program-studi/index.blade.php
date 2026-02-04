@extends('layouts.landing')

@section('title', 'Program Studi - UMBK')

@section('content')
<section class="page-header">
    <div class="container">
        <h1>Program Studi</h1>
        <p>Pilih program studi yang sesuai dengan minat dan bakat Anda</p>
    </div>
</section>

<section class="programs-section">
    <div class="container">
        <div class="programs-grid">
            <div class="program-card">
                <div class="program-icon"><i class="fas fa-laptop-code"></i></div>
                <h3>Teknik Informatika</h3>
                <p>Fakultas Teknik dan Komunikasi. Mempelajari rekayasa perangkat lunak, jaringan komputer, dan kecerdasan buatan.</p>
                <div class="program-info">
                    <span class="badge">S1</span>
                    <span class="badge">8 Semester</span>
                    <span class="badge">Akreditasi BAIK</span>
                </div>
                <a href="{{ route('program-studi.show', 'teknik-informatika') }}" class="program-link">Lihat Detail ⟶</a>
            </div>

            <div class="program-card">
                <div class="program-icon"><i class="fas fa-bullhorn"></i></div>
                <h3>Ilmu Komunikasi</h3>
                <p>Fakultas Teknik dan Komunikasi. Mengembangkan kemampuan komunikasi digital, jurnalistik, dan public relations.</p>
                <div class="program-info">
                    <span class="badge">S1</span>
                    <span class="badge">8 Semester</span>
                    <span class="badge">Akreditasi BAIK</span>
                </div>
                <a href="{{ route('program-studi.show', 'ilmu-komunikasi') }}" class="program-link">Lihat Detail ⟶</a>
            </div>

            <div class="program-card">
                <div class="program-icon"><i class="fas fa-balance-scale"></i></div>
                <h3>Ekonomi Islam</h3>
                <p>Fakultas Ekonomi dan Bisnis. Mempelajari sistem ekonomi berbasis syariah dan perbankan syariah.</p>
                <div class="program-info">
                    <span class="badge">S1</span>
                    <span class="badge">8 Semester</span>
                    <span class="badge">Akreditasi BAIK</span>
                </div>
                <a href="{{ route('program-studi.show', 'ekonomi-islam') }}" class="program-link">Lihat Detail ⟶</a>
            </div>

            <div class="program-card">
                <div class="program-icon"><i class="fas fa-chart-line"></i></div>
                <h3>Ekonomi Pembangunan</h3>
                <p>Fakultas Ekonomi dan Bisnis. Analisis kebijakan ekonomi dan perencanaan pembangunan.</p>
                <div class="program-info">
                    <span class="badge">S1</span>
                    <span class="badge">8 Semester</span>
                    <span class="badge">Akreditasi BAIK</span>
                </div>
                <a href="{{ route('program-studi.show', 'ekonomi-pembangunan') }}" class="program-link">Lihat Detail ⟶</a>
            </div>

            <div class="program-card">
                <div class="program-icon"><i class="fas fa-calculator"></i></div>
                <h3>Akuntansi</h3>
                <p>Fakultas Ekonomi dan Bisnis. Menghasilkan akuntan profesional yang kompeten.</p>
                <div class="program-info">
                    <span class="badge">S1</span>
                    <span class="badge">8 Semester</span>
                    <span class="badge">Akreditasi BAIK</span>
                </div>
                <a href="{{ route('program-studi.show', 'akuntansi') }}" class="program-link">Lihat Detail ⟶</a>
            </div>

            <div class="program-card">
                <div class="program-icon"><i class="fas fa-briefcase"></i></div>
                <h3>Manajemen</h3>
                <p>Fakultas Ekonomi dan Bisnis. Mencetak lulusan profesional di bidang bisnis, SDM, pemasaran.</p>
                <div class="program-info">
                    <span class="badge">S1</span>
                    <span class="badge">8 Semester</span>
                    <span class="badge">Akreditasi BAIK</span>
                </div>
                <a href="{{ route('program-studi.show', 'manajemen') }}" class="program-link">Lihat Detail ⟶</a>
            </div>

            <div class="program-card">
                <div class="program-icon"><i class="fas fa-brain"></i></div>
                <h3>Psikologi</h3>
                <p>Fakultas Ilmu Sosial dan Humaniora. Mempelajari perilaku manusia, kesehatan mental, dan pengembangan potensi.</p>
                <div class="program-info">
                    <span class="badge">S1</span>
                    <span class="badge">8 Semester</span>
                    <span class="badge">Akreditasi BAIK</span>
                </div>
                <a href="{{ route('program-studi.show', 'psikologi') }}" class="program-link">Lihat Detail ⟶</a>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container text-center">
        <h2>Siap Memulai Perjalanan Akademik Anda?</h2>
        <p>Pilih program studi yang sesuai dengan minat dan bakat Anda</p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
        </a>
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
    margin-bottom: 20px;
}

.page-header p {
    font-size: 1.2rem;
    opacity: 0.9;
}

.programs-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.programs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.program-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
}

.program-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.program-icon {
    width: 80px;
    height: 80px;
    background: #A00000;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    font-size: 2rem;
}

.program-card h3 {
    color: #333;
    margin-bottom: 15px;
    font-size: 1.5rem;
}

.program-card p {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
}

.program-info {
    margin-bottom: 20px;
}

.program-info .badge {
    background: #e9ecef;
    color: #495057;
    padding: 5px 10px;
    margin: 0 5px;
    border-radius: 20px;
    font-size: 0.8rem;
}

.program-link {
    color: #A00000;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    transition: color 0.3s ease;
}

.program-link:hover {
    color: #800000;
}

.cta-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #A00000 0%, #800000 100%);
    color: white;
    text-align: center;
}

.cta-section h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.cta-section p {
    font-size: 1.2rem;
    margin-bottom: 30px;
    opacity: 0.9;
}

.btn-primary {
    background: white;
    color: #A00000;
    border: none;
    padding: 15px 40px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

@media (max-width: 992px) {
    .page-header h1 {
        font-size: 2.5rem;
    }
    
    .programs-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }
    
    .program-card {
        padding: 25px;
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
    
    .programs-section {
        padding: 60px 0;
    }
    
    .programs-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        margin-top: 30px;
    }
    
    .program-card {
        padding: 20px;
        text-align: center;
    }
    
    .program-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
        margin: 0 auto 15px;
    }
    
    .program-card h3 {
        font-size: 1.3rem;
        margin-bottom: 10px;
    }
    
    .program-card p {
        font-size: 0.9rem;
        margin-bottom: 15px;
    }
    
    .program-info {
        margin-bottom: 15px;
    }
    
    .program-info .badge {
        font-size: 0.7rem;
        padding: 4px 8px;
        margin: 0 3px;
    }
    
    .cta-section {
        padding: 60px 0;
    }
    
    .cta-section h2 {
        font-size: 2rem;
    }
    
    .cta-section p {
        font-size: 1rem;
    }
    
    .btn-primary {
        padding: 12px 30px;
        font-size: 1rem;
    }
}

@media (max-width: 576px) {
    .page-header {
        padding: 40px 0;
    }
    
    .page-header h1 {
        font-size: 1.8rem;
    }
    
    .programs-section {
        padding: 40px 0;
    }
    
    .programs-grid {
        gap: 15px;
        margin-top: 20px;
    }
    
    .program-card {
        padding: 15px;
    }
    
    .program-icon {
        width: 50px;
        height: 50px;
        font-size: 1.3rem;
    }
    
    .program-card h3 {
        font-size: 1.2rem;
    }
    
    .program-card p {
        font-size: 0.85rem;
    }
    
    .program-info .badge {
        font-size: 0.65rem;
        padding: 3px 6px;
        margin: 0 2px;
    }
    
    .cta-section {
        padding: 40px 0;
    }
    
    .cta-section h2 {
        font-size: 1.6rem;
    }
    
    .btn-primary {
        padding: 10px 25px;
        font-size: 0.9rem;
    }
}

/* Tablet Landscape */
@media (min-width: 769px) and (max-width: 992px) {
    .programs-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Large Tablets */
@media (min-width: 993px) and (max-width: 1200px) {
    .programs-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}
</style>
