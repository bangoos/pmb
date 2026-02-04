<?php $__env->startSection('title', $program['nama'] . ' - UMBK'); ?>

<?php $__env->startSection('content'); ?>
<section class="page-header">
    <div class="container">
        <h1><?php echo e($program['nama']); ?></h1>
        <p><?php echo e($program['fakultas']); ?></p>
    </div>
</section>

<section class="program-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="program-content">
                    <div class="program-overview">
                        <h2>Tentang Program Studi</h2>
                        <p><?php echo e($program['deskripsi']); ?></p>
                        
                        <div class="program-meta">
                            <div class="meta-item">
                                <i class="fas fa-graduation-cap"></i>
                                <div>
                                    <strong>Jenjang:</strong> <?php echo e($program['jenjang']); ?>

                                </div>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <strong>Durasi:</strong> <?php echo e($program['durasi']); ?>

                                </div>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-certificate"></i>
                                <div>
                                    <strong>Akreditasi:</strong> <?php echo e($program['akreditasi']); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="program-vision-mission">
                        <h3>Visi</h3>
                        <p><?php echo e($program['visi']); ?></p>
                        
                        <h3>Misi</h3>
                        <ul>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $program['misi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $misi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($misi); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>

                    <div class="program-competencies">
                        <h3>Kompetensi Lulusan</h3>
                        <div class="competencies-grid">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $program['kompetensi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kompetensi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="competency-item">
                                <i class="fas fa-check-circle"></i>
                                <span><?php echo e($kompetensi); ?></span>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <div class="program-careers">
                        <h3>Prospek Kerja</h3>
                        <div class="careers-grid">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $program['prospek_kerja']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="career-item">
                                <i class="fas fa-briefcase"></i>
                                <span><?php echo e($career); ?></span>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <div class="program-facilities">
                        <h3>Fasilitas</h3>
                        <div class="facilities-grid">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $program['fasilitas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="facility-item">
                                <i class="fas fa-building"></i>
                                <span><?php echo e($facility); ?></span>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                                <strong>Rp <?php echo e(number_format($program['biaya']['registrasi'], 0, ',', '.')); ?></strong>
                            </div>
                            <div class="fee-item">
                                <span>SPP per Bulan</span>
                                <strong>Rp <?php echo e(number_format($program['biaya']['spp_per_bulan'], 0, ',', '.')); ?></strong>
                            </div>
                            <div class="fee-item">
                                <span>Biaya Prakuliah</span>
                                <strong>Rp <?php echo e(number_format($program['biaya']['prakuliah'], 0, ',', '.')); ?></strong>
                            </div>
                            <div class="fee-item">
                                <span>Biaya per Semester</span>
                                <strong>Rp <?php echo e(number_format($program['biaya']['semester'], 0, ',', '.')); ?></strong>
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
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary btn-block">
                                <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                            </a>
                            <a href="<?php echo e(route('pendaftaran.biaya')); ?>" class="btn btn-outline-primary btn-block">
                                <i class="fas fa-info-circle me-2"></i>Info Biaya
                            </a>
                            <a href="<?php echo e(route('landing')); ?>#program-studi" class="btn btn-outline-secondary btn-block">
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
                <a href="<?php echo e(route('program-studi.show', 'ilmu-komunikasi')); ?>" class="related-link">Lihat Detail</a>
            </div>
            <div class="related-card">
                <div class="related-icon"><i class="fas fa-balance-scale"></i></div>
                <h4>Ekonomi Islam</h4>
                <p>Fakultas Ekonomi dan Bisnis</p>
                <a href="<?php echo e(route('program-studi.show', 'ekonomi-islam')); ?>" class="related-link">Lihat Detail</a>
            </div>
            <div class="related-card">
                <div class="related-icon"><i class="fas fa-calculator"></i></div>
                <h4>Akuntansi</h4>
                <p>Fakultas Ekonomi dan Bisnis</p>
                <a href="<?php echo e(route('program-studi.show', 'akuntansi')); ?>" class="related-link">Lihat Detail</a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

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

@media (max-width: 768px) {
    .page-header h1 {
        font-size: 2rem;
    }
    
    .program-meta {
        grid-template-columns: 1fr;
    }
    
    .competencies-grid,
    .careers-grid,
    .facilities-grid {
        grid-template-columns: 1fr;
    }
    
    .program-sidebar {
        position: static;
    }
    
    .related-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Admin\Documents\trae_projects\umbk\resources\views/program-studi/show.blade.php ENDPATH**/ ?>