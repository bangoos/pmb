@extends('layouts.admin')

@section('title', 'Detail Pembayaran')
@section('page-title', 'Detail Pembayaran')

@section('content')
<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Pembayaran #{{ $payment->id }}</h2>
                <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Informasi Pembayaran</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr><td>ID:</td><td>{{ $payment->id }}</td></tr>
                        <tr><td>Order ID:</td><td><code>{{ $payment->order_id }}</code></td></tr>
                        <tr><td>Jenis:</td><td><span class="badge bg-info">{{ ucfirst($payment->jenis) }}</span></td></tr>
                        <tr><td>Jumlah:</td><td><h5>Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</h5></td></tr>
                        <tr><td>Status:</td><td><span class="badge {{ getPaymentStatusBadge($payment->status) }}">{{ ucfirst($payment->status) }}</span></td></tr>
                        <tr><td>Dibuat:</td><td>{{ $payment->created_at->format('d/m/Y H:i') }}</td></tr>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Informasi User</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr><td>Nama:</td><td>{{ $payment->user->name }}</td></tr>
                        <tr><td>Email:</td><td>{{ $payment->user->email }}</td></tr>
                        <tr><td>HP:</td><td>{{ $payment->user->phone ?? '-' }}</td></tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Aksi</h5>
                </div>
                <div class="card-body">
                    @if($payment->status === 'pending')
                    <form method="POST" action="{{ route('admin.payments.update-status', $payment->id) }}" class="mb-2">
                        @csrf
                        <input type="hidden" name="status" value="settlement">
                        <button type="submit" class="btn btn-success w-100">Setujui Pembayaran</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@php
function getPaymentStatusBadge($status) {
    $badges = ['pending' => 'bg-warning', 'settlement' => 'bg-success', 'expire' => 'bg-danger', 'cancel' => 'bg-secondary'];
    return $badges[$status] ?? 'bg-secondary';
}
@endphp
@endsection
