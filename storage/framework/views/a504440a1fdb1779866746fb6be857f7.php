<?php $__env->startSection('title', 'Soal Tes - Admin PMB UMBK'); ?>
<?php $__env->startSection('page-title', 'Management Soal Tes'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Management Soal Tes</h2>
                    <p class="text-muted mb-0">Kelola bank soal untuk tes seleksi mahasiswa</p>
                </div>
                <div>
                    <a href="<?php echo e(route('admin.tests.create')); ?>" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Soal
                    </a>
                    <a href="<?php echo e(route('admin.tests.export')); ?>" class="btn btn-success ms-2">
                        <i class="fas fa-download me-2"></i>Export
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
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-value"><?php echo e(number_format($stats['total_soal'])); ?></div>
                <div class="stat-label">Total Soal</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card success">
                <div class="stat-icon success">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="stat-value"><?php echo e(number_format($stats['total_jawaban'])); ?></div>
                <div class="stat-label">Total Jawaban</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card warning">
                <div class="stat-icon warning">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-value"><?php echo e(number_format($stats['rata_rata_nilai'], 1)); ?></div>
                <div class="stat-label">Rata-rata Nilai</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card info">
                <div class="stat-icon info">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-value"><?php echo e(number_format($stats['peserta_tes'])); ?></div>
                <div class="stat-label">Peserta Tes</div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="<?php echo e(route('admin.tests.results')); ?>" class="btn btn-outline-info w-100">
                                <i class="fas fa-chart-bar me-2"></i>Lihat Hasil Tes
                            </a>
                        </div>
                        <div class="col-md-3">
                            <form action="<?php echo e(route('admin.tests.import')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="file" name="file" class="form-control d-none" id="importFile" accept=".csv,.xlsx,.xls">
                                <button type="button" class="btn btn-outline-success w-100" onclick="document.getElementById('importFile').click()">
                                    <i class="fas fa-upload me-2"></i>Import Soal
                                </button>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <a href="<?php echo e(route('admin.tests.create')); ?>" class="btn btn-outline-primary w-100">
                                <i class="fas fa-plus me-2"></i>Generate Random
                            </a>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-warning w-100" onclick="confirmBulkDelete()">
                                <i class="fas fa-trash me-2"></i>Hapus Semua
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Questions Table -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>Daftar Soal Tes
            </h5>
        </div>
        <div class="card-body">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($soal->count() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="40%">Pertanyaan</th>
                                <th width="10%">Jawaban</th>
                                <th width="10%">Bobot</th>
                                <th width="15%">Jumlah Dijawab</th>
                                <th width="10%">Status</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td>
                                    <div class="text-truncate" style="max-width: 300px;" title="<?php echo e($item->pertanyaan); ?>">
                                        <?php echo e(Str::limit($item->pertanyaan, 100)); ?>

                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-primary"><?php echo e(strtoupper($item->jawaban_benar)); ?></span>
                                </td>
                                <td><?php echo e($item->bobot); ?></td>
                                <td><?php echo e($item->jawaban_tes_count ?? 0); ?></td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?php echo e(route('admin.tests.show', $item->id)); ?>" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.tests.edit', $item->id)); ?>" 
                                           class="btn btn-sm btn-outline-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" 
                                                onclick="confirmDelete(<?php echo e($item->id); ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        Menampilkan <?php echo e($soal->firstItem()); ?> - <?php echo e($soal->lastItem()); ?> 
                        dari <?php echo e($soal->total()); ?> soal
                    </div>
                    <div>
                        <?php echo e($soal->links()); ?>

                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-4">
                    <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                    <p class="text-muted mb-3">Belum ada soal tes</p>
                    <a href="<?php echo e(route('admin.tests.create')); ?>" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Soal Pertama
                    </a>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>

<form id="deleteForm" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
</form>

<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus soal ini?')) {
        const form = document.getElementById('deleteForm');
        form.action = `/admin/tests/${id}`;
        form.submit();
    }
}

function confirmBulkDelete() {
    if (confirm('Apakah Anda yakin ingin menghapus SEMUA soal? Tindakan ini tidak dapat dibatalkan!')) {
        // Implement bulk delete here
        alert('Fitur bulk delete akan segera tersedia');
    }
}

// Auto-submit import form when file is selected
document.getElementById('importFile').addEventListener('change', function() {
    if (this.files.length > 0) {
        this.form.submit();
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Admin\Documents\trae_projects\umbk\resources\views/admin/tests/index.blade.php ENDPATH**/ ?>