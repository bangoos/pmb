<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Penerimaan Mahasiswa Baru - UMBK'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <header>
        <div class="container header-container">
            <div class="logo">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="UMBK Logo" onerror="this.style.display='none';">
            </div>
            <nav>
                <ul>
                    <li><a href="<?php echo e(route('landing')); ?>" <?php if(request()->route()->getName() == 'landing'): ?> style="color: #ffcccc;" <?php endif; ?>>Beranda</a></li>
                    <li><a href="<?php echo e(route('about.index')); ?>" <?php if(request()->route()->getName() == 'about.index'): ?> style="color: #ffcccc;" <?php endif; ?>>Tentang Kami</a></li>
                    
                    <!-- Pendaftaran Dropdown -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Pendaftaran</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(route('pendaftaran.petunjuk')); ?>">Petunjuk Pendaftaran</a></li>
                            <li><a href="<?php echo e(route('pendaftaran.biaya')); ?>">Biaya Perkuliahan</a></li>
                        </ul>
                    </li>
                    
                    <!-- Jalur Pendaftaran Dropdown -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Jalur Pendaftaran</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(route('pendaftaran.reguler')); ?>">Jalur Pendaftaran Reguler</a></li>
                            <li><a href="<?php echo e(route('pendaftaran.kelas-karyawan')); ?>">Jalur Pendaftaran Kelas Karyawan</a></li>
                            <li><a href="<?php echo e(route('pendaftaran.rpl')); ?>">Jalur Pendaftaran RPL</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="<?php echo e(route('landing')); ?>#program-studi">Program Studi</a></li>
                    
                    <!-- Beasiswa Dropdown -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" <?php if(request()->route()->getName() == 'beasiswa.index'): ?> style="color: #ffcccc;" <?php endif; ?>>Beasiswa</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(route('beasiswa.index')); ?>">Semua Beasiswa</a></li>
                            <li><a href="<?php echo e(route('beasiswa.show', 'hafidz')); ?>">Beasiswa Hafidz</a></li>
                            <li><a href="<?php echo e(route('beasiswa.show', 'prestasi')); ?>">Beasiswa Prestasi</a></li>
                            <li><a href="<?php echo e(route('beasiswa.show', 'persyarikatan')); ?>">Beasiswa Persyarikatan</a></li>
                            <li><a href="<?php echo e(route('beasiswa.show', 'mitra-zis')); ?>">Beasiswa Mitra dan Lembaga ZIS</a></li>
                            <li><a href="<?php echo e(route('beasiswa.show', 'kip-kuliah')); ?>">Beasiswa KIP-Kuliah</a></li>
                            <li><a href="<?php echo e(route('beasiswa.show', 'karawang-cerdas')); ?>">Beasiswa Karawang Cerdas</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-outline">Dashboard</a>
                    <form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-primary">Keluar</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-outline">Daftar Sekarang</a>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Masuk</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </header>

    <?php echo $__env->yieldContent('content'); ?>

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

    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Admin\Documents\trae_projects\umbk\resources\views/layouts/landing.blade.php ENDPATH**/ ?>