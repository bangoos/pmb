<?php $__env->startSection('title', 'Pengaturan - Admin PMB UMBK'); ?>
<?php $__env->startSection('page-title', 'Pengaturan Sistem'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Pengaturan Sistem</h2>
                    <p class="text-muted mb-0">Konfigurasi dan management sistem PMB UMBK</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Menu -->
    <div class="row">
        <!-- PMB Settings -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="stat-icon primary mx-auto mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-cog fa-2x"></i>
                    </div>
                    <h5 class="card-title">Pengaturan PMB</h5>
                    <p class="card-text text-muted">Atur biaya, Midtrans, dan konfigurasi PMB</p>
                    <a href="<?php echo e(route('admin.settings.pmb')); ?>" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Konfigurasi
                    </a>
                </div>
            </div>
        </div>

        <!-- System Info -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="stat-icon info mx-auto mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-server fa-2x"></i>
                    </div>
                    <h5 class="card-title">Informasi Sistem</h5>
                    <p class="card-text text-muted">Lihat informasi server dan konfigurasi sistem</p>
                    <a href="<?php echo e(route('admin.settings.system')); ?>" class="btn btn-info">
                        <i class="fas fa-info-circle me-2"></i>Lihat Info
                    </a>
                </div>
            </div>
        </div>

        <!-- Maintenance -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="stat-icon warning mx-auto mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-tools fa-2x"></i>
                    </div>
                    <h5 class="card-title">Maintenance</h5>
                    <p class="card-text text-muted">Mode maintenance, cache, dan backup</p>
                    <a href="<?php echo e(route('admin.settings.maintenance')); ?>" class="btn btn-warning">
                        <i class="fas fa-wrench me-2"></i>Maintenance
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
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
                            <a href="<?php echo e(route('admin.settings.cache')); ?>" class="btn btn-outline-primary w-100">
                                <i class="fas fa-broom me-2"></i>Clear Cache
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="<?php echo e(route('admin.settings.backup')); ?>" class="btn btn-outline-success w-100">
                                <i class="fas fa-database me-2"></i>Backup Data
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="<?php echo e(route('admin.settings.logs')); ?>" class="btn btn-outline-info w-100">
                                <i class="fas fa-file-alt me-2"></i>Lihat Logs
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-outline-warning w-100" onclick="restartQueue()">
                                <i class="fas fa-sync me-2"></i>Restart Queue
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-heartbeat me-2"></i>Status Sistem
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Database</span>
                                <span class="badge bg-success">Online</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Cache</span>
                                <span class="badge bg-success">Active</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Session</span>
                                <span class="badge bg-success">Active</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Storage</span>
                                <span class="badge bg-success">Linked</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Environment</span>
                                <span class="badge bg-warning">Local</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Debug Mode</span>
                                <span class="badge bg-info"><?php echo e(config('app.debug') ? 'ON' : 'OFF'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-pie me-2"></i>Storage Usage
                    </h5>
                </div>
                <div class="card-body">
                    <?php
                    $storagePath = storage_path();
                    $totalSpace = disk_total_space($storagePath);
                    $freeSpace = disk_free_space($storagePath);
                    $usedSpace = $totalSpace - $freeSpace;
                    $usagePercent = ($usedSpace / $totalSpace) * 100;
                    ?>
                    
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Storage Usage</span>
                            <span><?php echo e(number_format($usagePercent, 1)); ?>%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar <?php echo e($usagePercent > 80 ? 'bg-danger' : ($usagePercent > 60 ? 'bg-warning' : 'bg-success')); ?>" 
                                 style="width: <?php echo e($usagePercent); ?>%"></div>
                        </div>
                    </div>
                    
                    <div class="row text-center">
                        <div class="col-4">
                            <h6 class="text-primary"><?php echo e(number_format($usedSpace / 1024 / 1024 / 1024, 2)); ?> GB</h6>
                            <small class="text-muted">Used</small>
                        </div>
                        <div class="col-4">
                            <h6 class="text-success"><?php echo e(number_format($freeSpace / 1024 / 1024 / 1024, 2)); ?> GB</h6>
                            <small class="text-muted">Free</small>
                        </div>
                        <div class="col-4">
                            <h6 class="text-info"><?php echo e(number_format($totalSpace / 1024 / 1024 / 1024, 2)); ?> GB</h6>
                            <small class="text-muted">Total</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Log -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-history me-2"></i>Aktivitas Terkini
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Aktivitas</th>
                                    <th>User</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo e(now()->format('H:i')); ?></td>
                                    <td>Admin login</td>
                                    <td><?php echo e(Auth::user()->name); ?></td>
                                    <td><span class="badge bg-success">Success</span></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(now()->subMinutes(5)->format('H:i')); ?></td>
                                    <td>Cache cleared</td>
                                    <td>System</td>
                                    <td><span class="badge bg-info">Info</span></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(now()->subMinutes(15)->format('H:i')); ?></td>
                                    <td>Database backup</td>
                                    <td>System</td>
                                    <td><span class="badge bg-success">Success</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function restartQueue() {
    if (confirm('Apakah Anda yakin ingin me-restart queue worker?')) {
        // Implement queue restart logic
        alert('Queue worker akan di-restart');
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Admin\Documents\trae_projects\umbk\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>