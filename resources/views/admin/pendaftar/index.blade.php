@extends('layouts.admin')

@section('title', 'Data Pendaftar - Admin PMB UMBK')
@section('page-title', 'Data Pendaftar')

@section('content')
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
                <div class="stat-value">{{ number_format($pendaftar->total()) }}</div>
                <div class="stat-label">Total Pendaftar</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card success">
                <div class="stat-icon success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-value">{{ number_format($pendaftar->where('biodata_lengkap', true)->count()) }}</div>
                <div class="stat-label">Biodata Lengkap</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card warning">
                <div class="stat-icon warning">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-value">{{ number_format($pendaftar->where('tes_selesai', true)->count()) }}</div>
                <div class="stat-label">Tes Selesai</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card info">
                <div class="stat-icon info">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="stat-value">{{ number_format($pendaftar->whereNotNull('nim')->count()) }}</div>
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
            <form method="GET" action="{{ route('admin.pendaftar.index') }}">
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Jalur Pendaftaran</label>
                        <select name="jalur_pendaftaran_id" class="form-select">
                            <option value="">Semua Jalur</option>
                            @foreach($jalur_options as $id => $nama)
                            <option value="{{ $id }}" {{ request('jalur_pendaftaran_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tahap</label>
                        <select name="tahap" class="form-select">
                            <option value="">Semua Tahap</option>
                            @foreach($tahap_options as $tahap)
                            <option value="{{ $tahap }}" {{ request('tahap') == $tahap ? 'selected' : '' }}>Tahap {{ $tahap }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Cari</label>
                        <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Nama atau email">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search me-1"></i>Filter
                            </button>
                            <a href="{{ route('admin.pendaftar.index') }}" class="btn btn-secondary">
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
            @if($pendaftar->count() > 0)
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
                            @foreach($pendaftar as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                            {{ substr($item->user->name, 0, 1) }}
                                        </div>
                                        {{ $item->user->name }}
                                    </div>
                                </td>
                                <td>{{ $item->user->email }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $item->jalurPendaftaran->nama ?? '-' }}</span>
                                </td>
                                <td>{{ $item->programStudi->nama ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-primary">Tahap {{ $item->tahap }}</span>
                                </td>
                                <td>
                                    @if($item->biodata_lengkap && $item->dokumen_terverifikasi)
                                        <span class="badge bg-success">Lengkap</span>
                                    @elseif($item->biodata_lengkap)
                                        <span class="badge bg-warning">Verifikasi</span>
                                    @else
                                        <span class="badge bg-secondary">Proses</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.pendaftar.show', $item->id) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-warning" 
                                                onclick="updateTahap({{ $item->id }}, {{ $item->tahap }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        Menampilkan {{ $pendaftar->firstItem() }} - {{ $pendaftar->lastItem() }} 
                        dari {{ $pendaftar->total() }} data
                    </div>
                    <div>
                        {{ $pendaftar->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-4">
                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada data pendaftar</p>
                </div>
            @endif
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
                @csrf
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
@endsection
