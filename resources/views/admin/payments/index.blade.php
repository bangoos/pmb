@extends('layouts.admin')

@section('title', 'Pembayaran - Admin PMB UMBK')
@section('page-title', 'Management Pembayaran')

@section('content')
<div class="container-fluid p-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Management Pembayaran</h2>
                    <p class="text-muted mb-0">Kelola semua pembayaran pendaftaran mahasiswa</p>
                </div>
                <div>
                    <a href="{{ route('admin.payments.export') }}" class="btn btn-success">
                        <i class="fas fa-download me-2"></i>Export Data
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
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="stat-value">{{ number_format($stats['total_payments']) }}</div>
                <div class="stat-label">Total Transaksi</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card success">
                <div class="stat-icon success">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-value">Rp {{ number_format($stats['total_amount'], 0, ',', '.') }}</div>
                <div class="stat-label">Total Nominal</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card warning">
                <div class="stat-icon warning">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-value">{{ number_format($stats['pending_payments']) }}</div>
                <div class="stat-label">Menunggu Pembayaran</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card info">
                <div class="stat-icon info">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-value">{{ number_format($stats['settlement_payments']) }}</div>
                <div class="stat-label">Pembayaran Sukses</div>
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
            <form method="GET" action="{{ route('admin.payments.index') }}">
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Jenis Pembayaran</label>
                        <select name="jenis" class="form-select">
                            <option value="">Semua</option>
                            <option value="registrasi" {{ request('jenis') == 'registrasi' ? 'selected' : '' }}>Registrasi</option>
                            <option value="awal" {{ request('jenis') == 'awal' ? 'selected' : '' }}>Tahap Awal</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">Semua</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="settlement" {{ request('status') == 'settlement' ? 'selected' : '' }}>Settlement</option>
                            <option value="expire" {{ request('status') == 'expire' ? 'selected' : '' }}>Expire</option>
                            <option value="cancel" {{ request('status') == 'cancel' ? 'selected' : '' }}>Cancel</option>
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
                            <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>Reset
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Payments Table -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>Daftar Pembayaran
            </h5>
        </div>
        <div class="card-body">
            @if($payments->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Tanggal Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td><code>{{ $payment->order_id }}</code></td>
                                <td>{{ $payment->user->name }}</td>
                                <td>{{ $payment->user->email }}</td>
                                <td>
                                    <span class="badge bg-info">{{ ucfirst($payment->jenis) }}</span>
                                </td>
                                <td>Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge {{ getPaymentStatusBadge($payment->status) }}">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </td>
                                <td>
                                    {{ $payment->paid_at ? $payment->paid_at->format('d/m/Y H:i') : '-' }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.payments.show', $payment->id) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($payment->status === 'pending')
                                        <button type="button" class="btn btn-sm btn-success" 
                                                onclick="updatePaymentStatus({{ $payment->id }}, 'settlement')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        @endif
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
                        Menampilkan {{ $payments->firstItem() }} - {{ $payments->lastItem() }} 
                        dari {{ $payments->total() }} data
                    </div>
                    <div>
                        {{ $payments->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-4">
                    <i class="fas fa-money-bill-wave fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada data pembayaran</p>
                </div>
            @endif
        </div>
    </div>
</div>

<form id="updateStatusForm" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="status" id="statusInput">
</form>

<script>
function updatePaymentStatus(id, status) {
    if (confirm('Apakah Anda yakin ingin mengubah status pembayaran ini?')) {
        document.getElementById('statusInput').value = status;
        const form = document.getElementById('updateStatusForm');
        form.action = `/admin/payments/${id}/status`;
        form.submit();
    }
}
</script>

@php
function getPaymentStatusBadge($status) {
    $badges = [
        'pending' => 'bg-warning',
        'settlement' => 'bg-success',
        'expire' => 'bg-danger',
        'cancel' => 'bg-secondary'
    ];
    
    return $badges[$status] ?? 'bg-secondary';
}
@endphp
@endsection
