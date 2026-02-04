<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Penerimaan Mahasiswa Baru - UMBK')</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @stack('styles')
</head>
<body>
    <header>
        <div class="container header-container">
            <div class="logo">
                <img src="{{ url('images/logo.png') }}" alt="UMBK Logo" onerror="this.style.display='none';">
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('landing') }}" @if(request()->route()->getName() == 'landing') style="color: #ffcccc;" @endif>Beranda</a></li>
                    <li><a href="{{ route('about.index') }}" @if(request()->route()->getName() == 'about.index') style="color: #ffcccc;" @endif>Tentang Kami</a></li>
                    
                    <!-- Pendaftaran Dropdown -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Pendaftaran</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('pendaftaran.petunjuk') }}">Petunjuk Pendaftaran</a></li>
                            <li><a href="{{ route('pendaftaran.biaya') }}">Biaya Perkuliahan</a></li>
                        </ul>
                    </li>
                    
                    <!-- Jalur Pendaftaran Dropdown -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Jalur Pendaftaran</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('pendaftaran.reguler') }}">Jalur Pendaftaran Reguler</a></li>
                            <li><a href="{{ route('pendaftaran.kelas-karyawan') }}">Jalur Pendaftaran Kelas Karyawan</a></li>
                            <li><a href="{{ route('pendaftaran.rpl') }}">Jalur Pendaftaran RPL</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="{{ route('landing') }}#program-studi">Program Studi</a></li>
                    
                    <!-- Beasiswa Dropdown -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" @if(request()->route()->getName() == 'beasiswa.index') style="color: #ffcccc;" @endif>Beasiswa</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('beasiswa.index') }}">Semua Beasiswa</a></li>
                            <li><a href="{{ route('beasiswa.show', 'hafidz') }}">Beasiswa Hafidz</a></li>
                            <li><a href="{{ route('beasiswa.show', 'prestasi') }}">Beasiswa Prestasi</a></li>
                            <li><a href="{{ route('beasiswa.show', 'persyarikatan') }}">Beasiswa Persyarikatan</a></li>
                            <li><a href="{{ route('beasiswa.show', 'mitra-zis') }}">Beasiswa Mitra dan Lembaga ZIS</a></li>
                            <li><a href="{{ route('beasiswa.show', 'kip-kuliah') }}">Beasiswa KIP-Kuliah</a></li>
                            <li><a href="{{ route('beasiswa.show', 'karawang-cerdas') }}">Beasiswa Karawang Cerdas</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="auth-buttons">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-outline">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('register') }}" class="btn btn-outline">Daftar Sekarang</a>
                    <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                @endauth
            </div>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="container footer-grid">
            <div class="footer-col about">
                <div class="logo footer-logo"><h2>UMBK</h2></div>
                <div class="address">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Kampus UMBK<br>Jl. Interchange Tol Karawang Barat, Wadas, Kec. Telukjambe Timur, Karawang Barat, Kab. Karawang – 41361</p>
                </div>
                <div class="socials">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Website</h4>
                <ul>
                    <li><a href="#">umbk.ac.id</a></li>
                    <li><a href="#">Fakultas</a></li>
                    <li><a href="#">Program Studi</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Media Sosial</h4>
                <ul>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">TikTok</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Jam Layanan</h4>
                <p><strong>Pendaftaran Online 24 Jam :</strong><br>pmb.umbk.ac.id</p>
                <p><strong>Pendaftaran Offline :</strong><br>Senin - Jumat (09.00 - 15.00 WIB)</p>
            </div>
        </div>
    </footer>

    <script src="{{ url('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
