<?php $__env->startSection('title', 'Dashboard Admin - PMB UMBK'); ?>
<?php $__env->startSection('page-title', 'Dashboard Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">
    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Selamat Datang, <?php echo e(Auth::user()->name); ?>! 👋</h2>
                    <p class="text-muted mb-0">Kelola pendaftaran mahasiswa baru UMBK dengan mudah dan efisien</p>
                </div>
                <div>
                    <a href="<?php echo e(route('admin.pendaftar.index')); ?>" class="btn btn-primary">
                        <i class="fas fa-users me-2"></i>Lihat Semua Pendaftar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card primary">
                <div class="stat-icon primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-value"><?php echo e(number_format($stats['total_pendaftar'])); ?></div>
                <div class="stat-label">Total Pendaftar</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card success">
                <div class="stat-icon success">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="stat-value"><?php echo e(number_format($stats['pendaftar_hari_ini'])); ?></div>
                <div class="stat-label">Pendaftar Hari Ini</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card info">
                <div class="stat-icon info">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="stat-value">Rp <?php echo e(number_format($stats['total_pembayaran_registrasi'], 0, ',', '.')); ?></div>
                <div class="stat-label">Pembayaran Registrasi</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card warning">
                <div class="stat-icon warning">
                    <i class="fas fa-coins"></i>
                </div>
                <div class="stat-value">Rp <?php echo e(number_format($stats['total_pembayaran_awal'], 0, ',', '.')); ?></div>
                <div class="stat-label">Pembayaran Awal</div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-bar me-2"></i>Progress Pendaftaran per Tahap
                    </h5>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height: 300px;">
                        <canvas id="tahapChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-pie me-2"></i>Distribusi Jalur Pendaftaran
                    </h5>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height: 300px;">
                        <canvas id="jalurChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="row">
        <!-- Recent Pendaftar -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-user-plus me-2"></i>Pendaftar Terbaru
                    </h5>
                </div>
                <div class="card-body">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recent_pendaftar->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tahap</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $recent_pendaftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendaftar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                                    <?php echo e(substr($pendaftar->user->name, 0, 1)); ?>

                                                </div>
                                                <?php echo e($pendaftar->user->name); ?>

                                            </div>
                                        </td>
                                        <td><?php echo e($pendaftar->user->email); ?></td>
                                        <td>
                                            <span class="badge bg-info">Tahap <?php echo e($pendaftar->tahap); ?></span>
                                        </td>
                                        <td>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftar->biodata_lengkap && $pendaftar->dokumen_terverifikasi): ?>
                                                <span class="badge bg-success">Lengkap</span>
                                            <?php elseif($pendaftar->biodata_lengkap): ?>
                                                <span class="badge bg-warning">Verifikasi</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Proses</span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.pendaftar.show', $pendaftar->id)); ?>" 
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-4">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada pendaftar</p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Pending Verifications -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-clock me-2"></i>Menunggu Verifikasi
                    </h5>
                </div>
                <div class="card-body">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pending_verifications->count() > 0): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $pending_verifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendaftar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex align-items-center p-3 mb-3 border rounded-3 hover-shadow">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="avatar-sm bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <?php echo e(substr($pendaftar->user->name, 0, 1)); ?>

                                    </div>
                                    <div>
                                        <h6 class="mb-1"><?php echo e($pendaftar->user->name); ?></h6>
                                        <small class="text-muted"><?php echo e($pendaftar->user->email); ?></small>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <span class="badge bg-info"><?php echo e($pendaftar->jalurPendaftaran->nama ?? 'Tidak Diketahui'); ?></span>
                                    <span class="badge bg-warning">Tahap <?php echo e($pendaftar->tahap); ?></span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="<?php echo e(route('admin.pendaftar.show', $pendaftar->id)); ?>" 
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-check me-1"></i>Verifikasi
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>
                        <div class="text-center py-4">
                            <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                            <p class="text-muted">Tidak ada verifikasi pending</p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-bolt me-2"></i>Aksi Cepat
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-outline-primary w-100" onclick="showComingSoon('Export Data')">
                                <i class="fas fa-download me-2"></i>Export Data Pendaftar
                            </button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-outline-success w-100" onclick="showComingSoon('Generate Laporan')">
                                <i class="fas fa-file-excel me-2"></i>Generate Laporan
                            </button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-outline-info w-100" onclick="showComingSoon('Kirim Notifikasi')">
                                <i class="fas fa-bell me-2"></i>Kirim Notifikasi
                            </button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-outline-warning w-100" onclick="showComingSoon('Backup Data')">
                                <i class="fas fa-database me-2"></i>Backup Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-shadow {
    transition: all 0.3s ease;
}

.hover-shadow:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.chart-container {
    position: relative;
    height: 300px;
}

.avatar-sm {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    text-transform: uppercase;
}
</style>

<script>
// Chart Data
const tahapData = <?php echo json_encode($stats['pendaftar_per_tahap'], 15, 512) ?>;
const jalurData = <?php echo json_encode($stats['pendaftar_per_jalur'], 15, 512) ?>;

// Progress Chart
const tahapCtx = document.getElementById('tahapChart').getContext('2d');
new Chart(tahapCtx, {
    type: 'bar',
    data: {
        labels: ['Tahap 1', 'Tahap 2', 'Tahap 3', 'Tahap 4', 'Tahap 5', 'Tahap 6'],
        datasets: [{
            label: 'Jumlah Pendaftar',
            data: [
                tahapData[1] || 0,
                tahapData[2] || 0,
                tahapData[3] || 0,
                tahapData[4] || 0,
                tahapData[5] || 0,
                tahapData[6] || 0
            ],
            backgroundColor: 'rgba(160, 0, 0, 0.8)',
            borderColor: 'rgba(160, 0, 0, 1)',
            borderWidth: 2,
            borderRadius: 8,
            borderSkipped: false,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.8)',
                padding: 12,
                borderRadius: 8,
                titleFont: {
                    size: 14,
                    weight: 'bold'
                },
                bodyFont: {
                    size: 13
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    borderDash: [5, 5],
                    color: 'rgba(0,0,0,0.05)'
                },
                ticks: {
                    stepSize: 1,
                    font: {
                        size: 12
                    }
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    font: {
                        size: 12
                    }
                }
            }
        }
    }
});

// Jalur Chart
const jalurCtx = document.getElementById('jalurChart').getContext('2d');
new Chart(jalurCtx, {
    type: 'doughnut',
    data: {
        labels: Object.keys(jalurData),
        datasets: [{
            data: Object.values(jalurData),
            backgroundColor: [
                '#A00000',
                '#FF6B6B',
                '#4ECDC4',
                '#45B7D1',
                '#96CEB4',
                '#FECA57'
            ],
            borderWidth: 2,
            borderColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 15,
                    font: {
                        size: 12
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.8)',
                padding: 12,
                borderRadius: 8,
                callbacks: {
                    label: function(context) {
                        let label = context.label || '';
                        if (label) {
                            label += ': ';
                        }
                        label += context.parsed + ' pendaftar';
                        return label;
                    }
                }
            }
        }
    }
});
</script>

<?php
function getStatusBadgeClass($status) {
    $classes = [
        'pending' => 'bg-secondary',
        'pending_verification' => 'bg-warning',
        'verified' => 'bg-success',
        'rejected' => 'bg-danger',
        'completed' => 'bg-primary'
    ];
    
    return $classes[$status] ?? 'bg-secondary';
}
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Admin\Documents\trae_projects\umbk\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>