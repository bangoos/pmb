<?php $__env->startSection('title', 'Program Beasiswa - PMB UMBK'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title -->
    <section class="page-title" style="background: #A00000; padding: 40px 0; text-align: center; color: white;">
        <div class="container">
            <h1 style="font-size: 2.5rem; font-weight: 700;">Program Beasiswa</h1>
            <p>Raih kesempatan kuliah dengan dukungan beasiswa di UMBK</p>
        </div>
    </section>

    <!-- Beasiswa Grid -->
    <section class="beasiswa-section" style="padding: 60px 0; background: #f4f4f4;">
        <div class="container">
            <div class="beasiswa-grid">
                
                <!-- Beasiswa Hafidz Qur'an -->
                <div class="beasiswa-card">
                    <div class="beasiswa-image">
                        <img src="<?php echo e(asset('images/beasiswa-hafidz.png')); ?>" alt="Beasiswa Hafidz Qur'an">
                    </div>
                    <div class="beasiswa-content">
                        <h3>Beasiswa Hafidz Qur'an</h3>
                        <p>Beasiswa penuh bagi para penghafal Al-Qur'an yang berprestasi dan berkomitmen menjaga hafalannya.</p>
                        <a href="<?php echo e(route('beasiswa.show', 'hafidz')); ?>" class="beasiswa-link">Selengkapnya ⟶</a>
                    </div>
                </div>

                <!-- Beasiswa Karawang Cerdas -->
                <div class="beasiswa-card">
                    <div class="beasiswa-image">
                        <img src="<?php echo e(asset('images/beasiswa-karawang-cerdas.png')); ?>" alt="Beasiswa Karawang Cerdas">
                    </div>
                    <div class="beasiswa-content">
                        <h3>Beasiswa Karawang Cerdas</h3>
                        <p>Program beasiswa dari Pemerintah Kabupaten Karawang untuk putra-putri daerah berprestasi.</p>
                        <a href="<?php echo e(route('beasiswa.show', 'karawang-cerdas')); ?>" class="beasiswa-link">Selengkapnya ⟶</a>
                    </div>
                </div>

                <!-- Beasiswa KIP Kuliah -->
                <div class="beasiswa-card">
                    <div class="beasiswa-image">
                        <img src="<?php echo e(asset('images/beasiswa-kip-kuliah.png')); ?>" alt="Beasiswa KIP Kuliah">
                    </div>
                    <div class="beasiswa-content">
                        <h3>Beasiswa KIP Kuliah</h3>
                        <p>Bantuan biaya pendidikan dari pemerintah bagi lulusan SMA/SMK yang memiliki potensi akademik namun keterbatasan ekonomi.</p>
                        <a href="<?php echo e(route('beasiswa.show', 'kip-kuliah')); ?>" class="beasiswa-link">Selengkapnya ⟶</a>
                    </div>
                </div>

                <!-- Beasiswa Mitra ZIS -->
                <div class="beasiswa-card">
                    <div class="beasiswa-image">
                        <img src="<?php echo e(asset('images/beasiswa-mitra-zis.png')); ?>" alt="Beasiswa Mitra ZIS">
                    </div>
                    <div class="beasiswa-content">
                        <h3>Beasiswa Mitra ZIS</h3>
                        <p>Beasiswa kerjasama dengan Lembaga Zakat Infaq Shadaqah untuk mahasiswa yang membutuhkan.</p>
                        <a href="<?php echo e(route('beasiswa.show', 'mitra-zis')); ?>" class="beasiswa-link">Selengkapnya ⟶</a>
                    </div>
                </div>

                <!-- Beasiswa Persyarikatan -->
                <div class="beasiswa-card">
                    <div class="beasiswa-image">
                        <img src="<?php echo e(asset('images/beasiswa-persyarikatan.png')); ?>" alt="Beasiswa Persyarikatan">
                    </div>
                    <div class="beasiswa-content">
                        <h3>Beasiswa Persyarikatan</h3>
                        <p>Khusus bagi kader Muhammadiyah dan keluarga besar persyarikatan yang aktif di ortom.</p>
                        <a href="<?php echo e(route('beasiswa.show', 'persyarikatan')); ?>" class="beasiswa-link">Selengkapnya ⟶</a>
                    </div>
                </div>

                <!-- Beasiswa Prestasi -->
                <div class="beasiswa-card">
                    <div class="beasiswa-image">
                        <img src="<?php echo e(asset('images/beasiswa-prestasi.png')); ?>" alt="Beasiswa Prestasi">
                    </div>
                    <div class="beasiswa-content">
                        <h3>Beasiswa Prestasi</h3>
                        <p>Apresiasi bagi calon mahasiswa dengan prestasi akademik maupun non-akademik di tingkat regional hingga nasional.</p>
                        <a href="<?php echo e(route('beasiswa.show', 'prestasi')); ?>" class="beasiswa-link">Selengkapnya ⟶</a>
                    </div>
                </div>

                 <!-- Beasiswa Tahfidz -->
                 <div class="beasiswa-card">
                    <div class="beasiswa-image">
                        <img src="<?php echo e(asset('images/beasiswa-tahfidz.svg')); ?>" alt="Beasiswa Tahfidz">
                    </div>
                    <div class="beasiswa-content">
                        <h3>Beasiswa Tahfidz</h3>
                        <p>Program beasiswa khusus untuk tahfidz dengan hafalan juz tertentu.</p>
                        <a href="<?php echo e(route('beasiswa.show', 'tahfidz')); ?>" class="beasiswa-link">Selengkapnya ⟶</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Admin\Documents\trae_projects\umbk\resources\views/beasiswa/index.blade.php ENDPATH**/ ?>