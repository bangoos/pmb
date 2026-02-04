<?php $__env->startSection('title', $beasiswa['title'] . ' - PMB UMBK'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title -->
    <section class="beasiswa-detail-hero">
        <div class="container">
            <div class="beasiswa-detail-content">
                <img src="<?php echo e(asset('images/' . $beasiswa['image'])); ?>" alt="<?php echo e($beasiswa['title']); ?>" class="detail-image">
                <h1><?php echo e($beasiswa['title']); ?></h1>
                <p class="lead-text"><?php echo e($beasiswa['description']); ?></p>
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
                        <p><?php echo e($beasiswa['full_description']); ?></p>
                        
                        <h3>Persyaratan</h3>
                        <ul>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $beasiswa['requirements']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($requirement); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                        
                        <h3>Benefit</h3>
                        <ul>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $beasiswa['benefits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($benefit); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                        
                        <h3>Alur Pendaftaran</h3>
                        <ol>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $beasiswa['registration_flow']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($step); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary btn-block">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Admin\Documents\trae_projects\umbk\resources\views/beasiswa/show.blade.php ENDPATH**/ ?>