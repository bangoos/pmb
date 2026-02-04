<?php $__env->startSection('title', 'Data Pendaftar - Admin PMB UMBK'); ?>
<?php $__env->startSection('page-title', 'Data Pendaftar'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Data Pendaftar</h2>
                    <p class="text-muted mb-0">Kelola data pendaftaran mahasiswa baru</p>
                </div>
                <div>
                    <button class="btn btn-success" onclick="exportData()">
                        <i class="fas fa-download me-2"></i>Export Data
                    </button>
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
                <div class="stat-value"><?php echo e(number_format($pendaftar->total())); ?></div>
                <div class="stat-label">Total Pendaftar</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card success">
                <div class="stat-icon success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-value"><?php echo e(number_format($pendaftar->where('biodata_lengkap', true)->count())); ?></div>
                <div class="stat-label">Biodata Lengkap</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card warning">
                <div class="stat-icon warning">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-value"><?php echo e(number_format($pendaftar->where('tes_selesai', true)->count())); ?></div>
                <div class="stat-label">Tes Selesai</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card info">
                <div class="stat-icon info">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="stat-value"><?php echo e(number_format($pendaftar->whereNotNull('nim')->count())); ?></div>
                <div class="stat-label">Sudah NIM</div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-filter me-2"></i>Filter Data
            </h5>
        </div>
        <div class="card-body">
            <form method="GET" action="<?php echo e(route('admin.pendaftar.index')); ?>">
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Jalur Pendaftaran</label>
                        <select name="jalur_pendaftaran_id" class="form-select">
                            <option value="">Semua Jalur</option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $jalur_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $nama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>" <?php echo e(request('jalur_pendaftaran_id') == $id ? 'selected' : ''); ?>><?php echo e($nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tahap</label>
                        <select name="tahap" class="form-select">
                            <option value="">Semua Tahap</option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $tahap_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tahap); ?>" <?php echo e(request('tahap') == $tahap ? 'selected' : ''); ?>>Tahap <?php echo e($tahap); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Cari</label>
                        <input type="text" name="search" class="form-control" value="<?php echo e(request('search')); ?>" placeholder="Nama atau email">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search me-1"></i>Filter
                            </button>
                            <a href="<?php echo e(route('admin.pendaftar.index')); ?>" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>Reset
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Pendaftar Table -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>Daftar Pendaftar
            </h5>
        </div>
        <div class="card-body">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendaftar->count() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jalur</th>
                                <th>Program Studi</th>
                                <th>Tahap</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $pendaftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                            <?php echo e(substr($item->user->name, 0, 1)); ?>

                                        </div>
                                        <?php echo e($item->user->name); ?>

                                    </div>
                                </td>
                                <td><?php echo e($item->user->email); ?></td>
                                <td>
                                    <span class="badge bg-info"><?php echo e($item->jalurPendaftaran->nama ?? '-'); ?></span>
                                </td>
                                <td><?php echo e($item->programStudi->nama ?? '-'); ?></td>
                                <td>
                                    <span class="badge bg-primary">Tahap <?php echo e($item->tahap); ?></span>
                                </td>
                                <td>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->biodata_lengkap && $item->dokumen_terverifikasi): ?>
                                        <span class="badge bg-success">Lengkap</span>
                                    <?php elseif($item->biodata_lengkap): ?>
                                        <span class="badge bg-warning">Verifikasi</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Proses</span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?php echo e(route('admin.pendaftar.show', $item->id)); ?>" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-warning" 
                                                onclick="updateTahap(<?php echo e($item->id); ?>, <?php echo e($item->tahap); ?>)">
                                            <i class="fas fa-edit"></i>
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
                        Menampilkan <?php echo e($pendaftar->firstItem()); ?> - <?php echo e($pendaftar->lastItem()); ?> 
                        dari <?php echo e($pendaftar->total()); ?> data
                    </div>
                    <div>
                        <?php echo e($pendaftar->links()); ?>

                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-4">
                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada data pendaftar</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>

<!-- Update Tahap Modal -->
<div class="modal fade" id="updateTahapModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Tahap Pendaftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="updateTahapForm">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" name="pendaftaran_id" id="pendaftaranId">
                    <div class="mb-3">
                        <label class="form-label">Tahap Saat Ini: <span id="currentTahap" class="badge bg-primary"></span></label>
                    </div>
                    <div class="mb-3">
                        <label for="newTahap" class="form-label">Update ke Tahap:</label>
                        <select name="tahap" id="newTahap" class="form-select" required>
                            <option value="1">Tahap 1 - Registrasi</option>
                            <option value="2">Tahap 2 - Bayar Registrasi</option>
                            <option value="3">Tahap 3 - Tes Online</option>
                            <option value="4">Tahap 4 - Lengkapi Biodata</option>
                            <option value="5">Tahap 5 - Bayar Tahap Awal</option>
                            <option value="6">Tahap 6 - Kirim Hardcopy</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Catatan (Opsional):</label>
                        <textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function updateTahap(id, currentTahap) {
    document.getElementById('pendaftaranId').value = id;
    document.getElementById('currentTahap').textContent = 'Tahap ' + currentTahap;
    document.getElementById('newTahap').value = currentTahap;
    
    const modal = new bootstrap.Modal(document.getElementById('updateTahapModal'));
    modal.show();
}

document.getElementById('updateTahapForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = e.target;
    const id = form.pendaftaran_id.value;
    
    form.action = `/admin/pendaftar/${id}/status`;
    form.submit();
});

function exportData() {
    // Implement export functionality
    alert('Export data akan segera tersedia');
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Admin\Documents\trae_projects\umbk\resources\views/admin/pendaftar/index.blade.php ENDPATH**/ ?>