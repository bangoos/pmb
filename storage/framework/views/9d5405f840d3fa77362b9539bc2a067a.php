

<?php $__env->startSection('title', 'Dashboard Calon Mahasiswa - PMB UMBK'); ?>

<?php $__env->startSection('content'); ?>
<div class="container" style="padding: 40px 20px 80px;">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 style="color: #A00000; margin-bottom: 8px;">Dashboard Calon Mahasiswa</h1>
            <p style="margin-bottom: 0;">Selamat datang, <strong><?php echo e($user->name); ?></strong></p>
            <p class="text-muted">Email: <?php echo e($user->email); ?> | No. Pendaftaran: <?php echo e($pendaftaran->kode_pendaftaran ?? 'Menunggu'); ?></p>
        </div>
        <div class="col-md-4 text-end">
            <div class="card" style="background: linear-gradient(135deg, #A00000, #800000); color: white; border: none;">
                <div class="card-body">
                    <h6 class="card-title">Status Pendaftaran</h6>
                    <h5 class="card-text"><?php echo e(getStatusLabel($pendaftaran->status ?? 'pending')); ?></h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('info')): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i><?php echo e(session('info')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Progress Bar Alur Pendaftaran (6 Tahap) -->
    <div class="card mb-4" style="border-top: 4px solid #A00000;">
        <div class="card-header bg-white">
            <h5 class="card-title mb-0">
                <i class="fas fa-tasks me-2"></i>Progress Pendaftaran Anda
            </h5>
        </div>
        <div class="card-body">
            <div class="progress-container">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = getTahapanPendaftaran(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tahap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        $isCompleted = $pendaftaran && $pendaftaran->tahap > $index;
                        $isCurrent = $pendaftaran && $pendaftaran->tahap == $index + 1;
                        $isLocked = !$pendaftaran || $pendaftaran->tahap < $index;
                    ?>
                    
                    <div class="step-item <?php echo e($isCompleted ? 'completed' : ($isCurrent ? 'current' : ($isLocked ? 'locked' : ''))); ?>">
                        <div class="step-number">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isCompleted): ?>
                                <i class="fas fa-check"></i>
                            <?php else: ?>
                                <?php echo e($index + 1); ?>

                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="step-content">
                            <h6><?php echo e($tahap['title']); ?></h6>
                            <p class="text-muted small"><?php echo e($tahap['description']); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isCurrent): ?>
                                <span class="badge bg-warning">Sedang Berlangsung</span>
                            <?php elseif($isCompleted): ?>
                                <span class="badge bg-success">Selesai</span>
                            <?php elseif($isLocked): ?>
                                <span class="badge bg-secondary">Terkunci</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index < count(getTahapanPendaftaran()) - 1): ?>
                        <div class="progress-connector <?php echo e($isCompleted ? 'completed' : ''); ?>"></div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            
            <div class="mt-3">
                <small class="text-muted">
                    <i class="fas fa-info-circle"></i>
                    Anda saat ini di: <strong><?php echo e(getTahapanPendaftaran()[$pendaftaran->tahap - 1]['title'] ?? 'Belum Memulai'); ?></strong>
                </small>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bolt me-2"></i>Aksi Cepat
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran && $pendaftaran->tahap >= 1): ?>
                            <div class="col-md-3 mb-3">
                                <a href="<?php echo e(route('payment.registration')); ?>" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-credit-card me-2"></i>Bayar Registrasi
                                </a>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran && $pendaftaran->tahap >= 2): ?>
                            <div class="col-md-3 mb-3">
                                <a href="<?php echo e(route('test.index')); ?>" class="btn btn-outline-success w-100">
                                    <i class="fas fa-file-alt me-2"></i>Kerjakan Tes
                                </a>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran && $pendaftaran->tahap >= 3): ?>
                            <div class="col-md-3 mb-3">
                                <a href="<?php echo e(route('biodata.edit')); ?>" class="btn btn-outline-info w-100">
                                    <i class="fas fa-user-edit me-2"></i>Lengkapi Biodata
                                </a>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran && $pendaftaran->tahap >= 4): ?>
                            <div class="col-md-3 mb-3">
                                <a href="<?php echo e(route('payment.awal')); ?>" class="btn btn-outline-warning w-100">
                                    <i class="fas fa-money-bill-wave me-2"></i>Bayar Tahap Awal
                                </a>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran && $pendaftaran->tahap >= 5): ?>
                            <div class="col-md-3 mb-3">
                                <a href="<?php echo e(route('documents.upload')); ?>" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-file-upload me-2"></i>Upload Dokumen
                                </a>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Content Grid -->
    <div class="row">
        <!-- Informasi Pendaftaran -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>Informasi Pendaftaran
                    </h5>
                </div>
                <div class="card-body">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran): ?>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>Kode Pendaftaran:</strong></td>
                                <td><?php echo e($pendaftaran->kode_pendaftaran); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Jalur Pendaftaran:</strong></td>
                                <td><?php echo e($pendaftaran->jalur_pendaftaran); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Program Studi 1:</strong></td>
                                <td><?php echo e($pendaftaran->program_studi_1); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Program Studi 2:</strong></td>
                                <td><?php echo e($pendaftaran->program_studi_2 ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Daftar:</strong></td>
                                <td><?php echo e($pendaftaran->created_at->format('d/m/Y H:i')); ?></td>
                            </tr>
                        </table>
                    <?php else: ?>
                        <div class="text-center py-4">
                            <i class="fas fa-exclamation-triangle fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Anda belum melakukan pendaftaran.</p>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary">
                                <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                            </a>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Status Pembayaran -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-credit-card me-2"></i>Status Pembayaran
                    </h5>
                </div>
                <div class="card-body">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran && $pendaftaran->user->payments->count() > 0): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $pendaftaran->user->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-1"><?php echo e(ucfirst($payment->jenis)); ?></h6>
                                <span class="badge <?php echo e(getPaymentStatusBadge($payment->status)); ?>">
                                    <?php echo e(ucfirst($payment->status)); ?>

                                </span>
                            </div>
                            <p class="mb-1">Rp <?php echo e(number_format($payment->jumlah, 0, ',', '.')); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->status === 'pending'): ?>
                                <small class="text-muted">Menunggu pembayaran</small>
                            <?php elseif($payment->status === 'settlement'): ?>
                                <small class="text-success">Pembayaran berhasil</small>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>
                        <div class="text-center py-4">
                            <i class="fas fa-money-bill-wave fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada pembayaran</p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Timeline Aktivitas -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-history me-2"></i>Riwayat Aktivitas
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran): ?>
                            <!-- Registrasi -->
                            <div class="timeline-item completed">
                                <div class="timeline-marker">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6>Pendaftaran</h6>
                                    <p class="text-muted small"><?php echo e($pendaftaran->created_at->format('d/m/Y H:i')); ?></p>
                                </div>
                            </div>

                            <!-- Pembayaran Registrasi -->
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran->user->payments->where('jenis', 'registration')->first()): ?>
                            <?php $regPayment = $pendaftaran->user->payments->where('jenis', 'registration')->first() ?>
                            <div class="timeline-item <?php echo e($regPayment->status === 'settlement' ? 'completed' : 'pending'); ?>">
                                <div class="timeline-marker">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6>Pembayaran Registrasi</h6>
                                    <p class="text-muted small">
                                        <?php echo e($regPayment->status === 'settlement' ? 'Berhasil' : 'Pending'); ?> - 
                                        <?php echo e($regPayment->updated_at->format('d/m/Y H:i')); ?>

                                    </p>
                                </div>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <!-- Tes Online -->
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran->tes_result): ?>
                            <div class="timeline-item completed">
                                <div class="timeline-marker">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6>Tes Online</h6>
                                    <p class="text-muted small">
                                        Nilai: <?php echo e($pendaftaran->tes_result->score); ?> - 
                                        <?php echo e($pendaftaran->tes_result->updated_at->format('d/m/Y H:i')); ?>

                                    </p>
                                </div>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.progress-container {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.step-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 15px;
    border-radius: 8px;
    background: #f8f9fa;
    position: relative;
}

.step-item.completed {
    background: #d4edda;
    border-left: 4px solid #28a745;
}

.step-item.current {
    background: #fff3cd;
    border-left: 4px solid #ffc107;
}

.step-item.locked {
    background: #f8f9fa;
    border-left: 4px solid #6c757d;
    opacity: 0.6;
}

.step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #6c757d;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    flex-shrink: 0;
}

.step-item.completed .step-number {
    background: #28a745;
}

.step-item.current .step-number {
    background: #ffc107;
    color: #212529;
}

.step-content {
    flex: 1;
}

.step-content h6 {
    margin-bottom: 5px;
    font-weight: 600;
}

.progress-connector {
    width: 4px;
    height: 20px;
    background: #6c757d;
    margin-left: 18px;
}

.progress-connector.completed {
    background: #28a745;
}

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
    background: #6c757d;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
}

.timeline-item.completed .timeline-marker {
    background: #28a745;
}

.timeline-item.pending .timeline-marker {
    background: #ffc107;
}

.timeline-content h6 {
    margin-bottom: 5px;
    font-weight: 600;
}
</style>

<?php
function getTahapanPendaftaran() {
    return [
        [
            'title' => 'Registrasi',
            'description' => 'Mengisi formulir pendaftaran online'
        ],
        [
            'title' => 'Bayar Registrasi',
            'description' => 'Melakukan pembayaran biaya registrasi'
        ],
        [
            'title' => 'Tes Online',
            'description' => 'Mengerjakan tes seleksi online'
        ],
        [
            'title' => 'Lengkapi Biodata',
            'description' => 'Melengkapi data diri dan dokumen'
        ],
        [
            'title' => 'Bayar Tahap Awal',
            'description' => 'Melakukan pembayaran biaya kuliah awal'
        ],
        [
            'title' => 'Kirim Hardcopy',
            'description' => 'Mengirim dokumen fisik ke kampus'
        ]
    ];
}

function getStatusLabel($status) {
    $labels = [
        'pending' => 'Menunggu Verifikasi',
        'pending_verification' => 'Sedang Diverifikasi',
        'verified' => 'Terverifikasi',
        'rejected' => 'Ditolak',
        'completed' => 'Selesai'
    ];
    
    return $labels[$status] ?? 'Unknown';
}

function getPaymentStatusBadge($status) {
    $badges = [
        'pending' => 'bg-warning',
        'settlement' => 'bg-success',
        'expire' => 'bg-danger',
        'cancel' => 'bg-secondary'
    ];
    
    return $badges[$status] ?? 'bg-secondary';
}
?>
<?php $__env->stopSection(); ?>
        <p style="color: #666; font-size: 0.95rem;">Anda saat ini di: <strong><?php echo e(config('pmb.tahap')[$tahap] ?? 'Tahap ' . $tahap); ?></strong></p>
    </div>

    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px;">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$pendaftaran || $tahap < 2): ?>
            <a href="<?php echo e(route('payment.registration')); ?>" style="display: block; background: #A00000; color: #fff; padding: 24px; border-radius: 12px; text-align: center; font-weight: 600; text-decoration: none;">
                <i class="fas fa-credit-card" style="font-size: 2rem; margin-bottom: 8px;"></i><br>
                Bayar Biaya Registrasi
            </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran && $tahap >= 2 && !$pendaftaran->tes_selesai): ?>
            <a href="<?php echo e(route('tes.index')); ?>" style="display: block; background: #28a745; color: #fff; padding: 24px; border-radius: 12px; text-align: center; font-weight: 600; text-decoration: none;">
                <i class="fas fa-edit" style="font-size: 2rem; margin-bottom: 8px;"></i><br>
                Kerjakan Tes Online
            </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran && $tahap >= 3 && !$pendaftaran->biodata_lengkap): ?>
            <a href="<?php echo e(route('biodata.edit')); ?>" style="display: block; background: #17a2b8; color: #fff; padding: 24px; border-radius: 12px; text-align: center; font-weight: 600; text-decoration: none;">
                <i class="fas fa-user-edit" style="font-size: 2rem; margin-bottom: 8px;"></i><br>
                Lengkapi Biodata & Dokumen
            </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran && $tahap >= 5 && $pendaftaran->nim): ?>
            <div style="background: #fff3cd; padding: 24px; border-radius: 12px; border: 1px solid #ffc107;">
                <strong>NIM Anda:</strong> <?php echo e($pendaftaran->nim); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftaran && $tahap >= 5): ?>
            <?php $paidAwal = $user->payments()->where('jenis', 'awal')->whereIn('status', ['capture', 'settlement'])->exists(); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$paidAwal): ?>
                <a href="<?php echo e(route('payment.awal')); ?>" style="display: block; background: #6f42c1; color: #fff; padding: 24px; border-radius: 12px; text-align: center; font-weight: 600; text-decoration: none;">
                    <i class="fas fa-money-bill-wave" style="font-size: 2rem; margin-bottom: 8px;"></i><br>
                    Bayar Biaya Tahap Awal (Dapat NIM)
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Admin\Documents\trae_projects\umbk\resources\views/dashboard/index.blade.php ENDPATH**/ ?>