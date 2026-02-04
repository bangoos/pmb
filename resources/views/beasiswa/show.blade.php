@extends('layouts.landing')

@section('title', $beasiswa['title'] . ' - PMB UMBK')

@section('content')
    <!-- Page Title -->
    <section class="beasiswa-detail-hero">
        <div class="container">
            <div class="beasiswa-detail-content">
                <img src="{{ url('images/' . $beasiswa['image']) }}" alt="{{ $beasiswa['title'] }}" class="detail-image">
                <h1>{{ $beasiswa['title'] }}</h1>
                <p class="lead-text">{{ $beasiswa['description'] }}</p>
            </div>
        </div>
    </section>

    <!-- Beasiswa Detail Content -->
    <section class="beasiswa-detail-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="beasiswa-info">
                        <h3>Tentang Beasiswa</h3>
                        <p>{{ $beasiswa['full_description'] }}</p>
                        
                        <h3>Persyaratan</h3>
                        <ul>
                            @foreach($beasiswa['requirements'] as $requirement)
                                <li>{{ $requirement }}</li>
                            @endforeach
                        </ul>
                        
                        <h3>Benefit</h3>
                        <ul>
                            @foreach($beasiswa['benefits'] as $benefit)
                                <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                        
                        <h3>Alur Pendaftaran</h3>
                        <ol>
                            @foreach($beasiswa['registration_flow'] as $step)
                                <li>{{ $step }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="beasiswa-sidebar">
                        <div class="info-card">
                            <h4>Informasi Kontak</h4>
                            <p><strong>Untuk informasi lebih lanjut:</strong></p>
                            <ul>
                                <li><i class="fas fa-phone"></i> (+62) 813 9566 247</li>
                                <li><i class="fas fa-phone"></i> (+62) 878 6389 5222</li>
                                <li><i class="fas fa-envelope"></i> pmb@umbk.ac.id</li>
                                <li><i class="fas fa-globe"></i> pmb.umbk.ac.id</li>
                            </ul>
                        </div>
                        
                        <div class="cta-card">
                            <h4>Daftar Sekarang</h4>
                            <p>Jangan lewatkan kesempatan ini!</p>
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
