<?php $__env->startSection('title', 'Laporan - Admin PMB UMBK'); ?>
<?php $__env->startSection('page-title', 'Laporan PMB'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Laporan PMB</h2>
                    <p class="text-muted mb-0">Generate dan download laporan pendaftaran mahasiswa</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Options -->
    <div class="row">
        <!-- Pendaftar Report -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="stat-icon primary mx-auto mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <h5 class="card-title">Laporan Pendaftar</h5>
                    <p class="card-text text-muted">Generate laporan data pendaftar mahasiswa</p>
                    <div class="d-grid gap-2">
                        <a href="<?php echo e(route('admin.reports.pendaftar')); ?>" class="btn btn-primary">
                            <i class="fas fa-eye me-2"></i>Lihat Laporan
                        </a>
                        <a href="<?php echo e(route('admin.reports.export.pendaftar')); ?>" class="btn btn-outline-primary">
                            <i class="fas fa-download me-2"></i>Export CSV
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Report -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="stat-icon success mx-auto mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-money-bill-wave fa-2x"></i>
                    </div>
                    <h5 class="card-title">Laporan Pembayaran</h5>
                    <p class="card-text text-muted">Generate laporan pembayaran registrasi dan awal</p>
                    <div class="d-grid gap-2">
                        <a href="<?php echo e(route('admin.reports.payment')); ?>" class="btn btn-success">
                            <i class="fas fa-eye me-2"></i>Lihat Laporan
                        </a>
                        <a href="<?php echo e(route('admin.reports.export.payment')); ?>" class="btn btn-outline-success">
                            <i class="fas fa-download me-2"></i>Export CSV
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Report -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="stat-icon info mx-auto mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-chart-bar fa-2x"></i>
                    </div>
                    <h5 class="card-title">Statistik Lengkap</h5>
                    <p class="card-text text-muted">Lihat statistik lengkap dengan grafik dan analisis</p>
                    <div class="d-grid gap-2">
                        <a href="<?php echo e(route('admin.reports.statistics')); ?>" class="btn btn-info">
                            <i class="fas fa-chart-line me-2"></i>Lihat Statistik
                        </a>
                        <button class="btn btn-outline-info" disabled>
                            <i class="fas fa-file-pdf me-2"></i>Export PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-tachometer-alt me-2"></i>Quick Statistics
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center">
                                <h3 class="text-primary"><?php echo e(\App\Models\Pendaftaran::count()); ?></h3>
                                <p class="text-muted">Total Pendaftar</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h3 class="text-success">Rp <?php echo e(number_format(\App\Models\Payment::sum('jumlah'), 0, ',', '.')); ?></h3>
                                <p class="text-muted">Total Pembayaran</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h3 class="text-info"><?php echo e(\App\Models\Payment::where('status', 'settlement')->count()); ?></h3>
                                <p class="text-muted">Pembayaran Sukses</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h3 class="text-warning"><?php echo e(\App\Models\Pendaftaran::where('tes_selesai', true)->count()); ?></h3>
                                <p class="text-muted">Tes Selesai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-history me-2"></i>Aktivitas Terkini
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <?php
                        $recentPendaftar = \App\Models\Pendaftaran::with('user')->latest()->take(5)->get();
                        $recentPayments = \App\Models\Payment::with('user')->latest()->take(5)->get();
                        ?>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $recentPendaftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendaftar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="timeline-content">
                                <h6>Pendaftaran Baru</h6>
                                <p class="text-muted small">
                                    <?php echo e($pendaftar->user->name); ?> mendaftar pada <?php echo e($pendaftar->created_at->format('d/m/Y H:i')); ?>

                                </p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $recentPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="timeline-content">
                                <h6>Pembayaran <?php echo e(ucfirst($payment->jenis)); ?></h6>
                                <p class="text-muted small">
                                    <?php echo e($payment->user->name); ?> - Rp <?php echo e(number_format($payment->jumlah, 0, ',', '.')); ?> 
                                    (<?php echo e($payment->status); ?>) - <?php echo e($payment->created_at->format('d/m/Y H:i')); ?>

                                </p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>Informasi Export
                    </h5>
                </div>
                <div class="card-body">
                    <h6>Format Export:</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>CSV (Comma Separated Values)</li>
                        <li><i class="fas fa-check text-success me-2"></i>Excel Compatible</li>
                        <li><i class="fas fa-check text-success me-2"></i>UTF-8 Encoding</li>
                        <li><i class="fas fa-check text-success me-2"></i>Complete Data</li>
                    </ul>
                    
                    <h6 class="mt-3">Schedule Export:</h6>
                    <p class="text-muted small">Export dapat dijadwalkan otomatis melalui menu Settings.</p>
                    
                    <h6 class="mt-3">Data Backup:</h6>
                    <p class="text-muted small">Backup lengkap tersedia di menu Settings > Backup.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 8px;
    top: 0;
    height: 100%;
    width: 2px;
    background: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 30px;
    padding-left: 30px;
}

.timeline-marker {
    position: absolute;
    left: -30px;
    top: 0;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
}

.timeline-content h6 {
    margin-bottom: 5px;
    font-weight: 600;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Admin\Documents\trae_projects\umbk\resources\views/admin/reports/index.blade.php ENDPATH**/ ?>