@extends('layouts.landing')

@section('title', 'Dashboard Calon Mahasiswa - PMB UMBK')

@section('content')
<div class="container" style="padding: 40px 20px 80px;">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 style="color: #A00000; margin-bottom: 8px;">Dashboard Calon Mahasiswa</h1>
            <p style="margin-bottom: 0;">Selamat datang, <strong>{{ $user->name }}</strong></p>
            <p class="text-muted">Email: {{ $user->email }} | No. Pendaftaran: {{ $pendaftaran->kode_pendaftaran ?? 'Menunggu' }}</p>
        </div>
        <div class="col-md-4 text-end">
            <div class="card" style="background: linear-gradient(135deg, #A00000, #800000); color: white; border: none;">
                <div class="card-body">
                    <h6 class="card-title">Status Pendaftaran</h6>
                    <h5 class="card-text">{{ getStatusLabel($pendaftaran->status ?? 'pending') }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i>{{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Progress Bar Alur Pendaftaran (6 Tahap) -->
    <div class="card mb-4" style="border-top: 4px solid #A00000;">
        <div class="card-header bg-white">
            <h5 class="card-title mb-0">
                <i class="fas fa-tasks me-2"></i>Progress Pendaftaran Anda
            </h5>
        </div>
        <div class="card-body">
            <div class="progress-container">
                @foreach(getTahapanPendaftaran() as $index => $tahap)
                    @php 
                        $isCompleted = $pendaftaran && $pendaftaran->tahap > $index;
                        $isCurrent = $pendaftaran && $pendaftaran->tahap == $index + 1;
                        $isLocked = !$pendaftaran || $pendaftaran->tahap < $index;
                    @endphp
                    
                    <div class="step-item {{ $isCompleted ? 'completed' : ($isCurrent ? 'current' : ($isLocked ? 'locked' : '')) }}">
                        <div class="step-number">
                            @if($isCompleted)
                                <i class="fas fa-check"></i>
                            @else
                                {{ $index + 1 }}
                            @endif
                        </div>
                        <div class="step-content">
                            <h6>{{ $tahap['title'] }}</h6>
                            <p class="text-muted small">{{ $tahap['description'] }}</p>
                            @if($isCurrent)
                                <span class="badge bg-warning">Sedang Berlangsung</span>
                            @elseif($isCompleted)
                                <span class="badge bg-success">Selesai</span>
                            @elseif($isLocked)
                                <span class="badge bg-secondary">Terkunci</span>
                            @endif
                        </div>
                    </div>
                    
                    @if($index < count(getTahapanPendaftaran()) - 1)
                        <div class="progress-connector {{ $isCompleted ? 'completed' : '' }}"></div>
                    @endif
                @endforeach
            </div>
            
            <div class="mt-3">
                <small class="text-muted">
                    <i class="fas fa-info-circle"></i>
                    Anda saat ini di: <strong>{{ getTahapanPendaftaran()[$pendaftaran->tahap - 1]['title'] ?? 'Belum Memulai' }}</strong>
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
                        @if($pendaftaran && $pendaftaran->tahap >= 1)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('payment.registration') }}" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-credit-card me-2"></i>Bayar Registrasi
                                </a>
                            </div>
                        @endif
                        
                        @if($pendaftaran && $pendaftaran->tahap >= 2)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('test.index') }}" class="btn btn-outline-success w-100">
                                    <i class="fas fa-file-alt me-2"></i>Kerjakan Tes
                                </a>
                            </div>
                        @endif
                        
                        @if($pendaftaran && $pendaftaran->tahap >= 3)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('biodata.edit') }}" class="btn btn-outline-info w-100">
                                    <i class="fas fa-user-edit me-2"></i>Lengkapi Biodata
                                </a>
                            </div>
                        @endif
                        
                        @if($pendaftaran && $pendaftaran->tahap >= 4)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('payment.awal') }}" class="btn btn-outline-warning w-100">
                                    <i class="fas fa-money-bill-wave me-2"></i>Bayar Tahap Awal
                                </a>
                            </div>
                        @endif
                        
                        @if($pendaftaran && $pendaftaran->tahap >= 5)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('documents.upload') }}" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-file-upload me-2"></i>Upload Dokumen
                                </a>
                            </div>
                        @endif
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
                    @if($pendaftaran)
                        <table class="table table-sm">
                            <tr>
                                <td><strong>Kode Pendaftaran:</strong></td>
                                <td>{{ $pendaftaran->kode_pendaftaran }}</td>
                            </tr>
                            <tr>
                                <td><strong>Jalur Pendaftaran:</strong></td>
                                <td>{{ $pendaftaran->jalur_pendaftaran }}</td>
                            </tr>
                            <tr>
                                <td><strong>Program Studi 1:</strong></td>
                                <td>{{ $pendaftaran->program_studi_1 }}</td>
                            </tr>
                            <tr>
                                <td><strong>Program Studi 2:</strong></td>
                                <td>{{ $pendaftaran->program_studi_2 ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Daftar:</strong></td>
                                <td>{{ $pendaftaran->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-exclamation-triangle fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Anda belum melakukan pendaftaran.</p>
                            <a href="{{ route('register') }}" class="btn btn-primary">
                                <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                            </a>
                        </div>
                    @endif
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
                    @if($pendaftaran && $pendaftaran->user->payments->count() > 0)
                        @foreach($pendaftaran->user->payments as $payment)
                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-1">{{ ucfirst($payment->jenis) }}</h6>
                                <span class="badge {{ getPaymentStatusBadge($payment->status) }}">
                                    {{ ucfirst($payment->status) }}
                                </span>
                            </div>
                            <p class="mb-1">Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</p>
                            @if($payment->status === 'pending')
                                <small class="text-muted">Menunggu pembayaran</small>
                            @elseif($payment->status === 'settlement')
                                <small class="text-success">Pembayaran berhasil</small>
                            @endif
                        </div>
                        @endforeach
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-money-bill-wave fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada pembayaran</p>
                        </div>
                    @endif
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
                        @if($pendaftaran)
                            <!-- Registrasi -->
                            <div class="timeline-item completed">
                                <div class="timeline-marker">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6>Pendaftaran</h6>
                                    <p class="text-muted small">{{ $pendaftaran->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>

                            <!-- Pembayaran Registrasi -->
                            @if($pendaftaran->user->payments->where('jenis', 'registration')->first())
                            @php $regPayment = $pendaftaran->user->payments->where('jenis', 'registration')->first() @endphp
                            <div class="timeline-item {{ $regPayment->status === 'settlement' ? 'completed' : 'pending' }}">
                                <div class="timeline-marker">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6>Pembayaran Registrasi</h6>
                                    <p class="text-muted small">
                                        {{ $regPayment->status === 'settlement' ? 'Berhasil' : 'Pending' }} - 
                                        {{ $regPayment->updated_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>
                            @endif

                            <!-- Tes Online -->
                            @if($pendaftaran->tes_result)
                            <div class="timeline-item completed">
                                <div class="timeline-marker">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6>Tes Online</h6>
                                    <p class="text-muted small">
                                        Nilai: {{ $pendaftaran->tes_result->score }} - 
                                        {{ $pendaftaran->tes_result->updated_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>
                            @endif
                        @endif
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

@php
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
@endphp
@endsection
        <p style="color: #666; font-size: 0.95rem;">Anda saat ini di: <strong>{{ config('pmb.tahap')[$tahap] ?? 'Tahap ' . $tahap }}</strong></p>
    </div>

    {{-- Aksi Cepat --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px;">
        @if(!$pendaftaran || $tahap < 2)
            <a href="{{ route('payment.registration') }}" style="display: block; background: #A00000; color: #fff; padding: 24px; border-radius: 12px; text-align: center; font-weight: 600; text-decoration: none;">
                <i class="fas fa-credit-card" style="font-size: 2rem; margin-bottom: 8px;"></i><br>
                Bayar Biaya Registrasi
            </a>
        @endif
        @if($pendaftaran && $tahap >= 2 && !$pendaftaran->tes_selesai)
            <a href="{{ route('tes.index') }}" style="display: block; background: #28a745; color: #fff; padding: 24px; border-radius: 12px; text-align: center; font-weight: 600; text-decoration: none;">
                <i class="fas fa-edit" style="font-size: 2rem; margin-bottom: 8px;"></i><br>
                Kerjakan Tes Online
            </a>
        @endif
        @if($pendaftaran && $tahap >= 3 && !$pendaftaran->biodata_lengkap)
            <a href="{{ route('biodata.edit') }}" style="display: block; background: #17a2b8; color: #fff; padding: 24px; border-radius: 12px; text-align: center; font-weight: 600; text-decoration: none;">
                <i class="fas fa-user-edit" style="font-size: 2rem; margin-bottom: 8px;"></i><br>
                Lengkapi Biodata & Dokumen
            </a>
        @endif
        @if($pendaftaran && $tahap >= 5 && $pendaftaran->nim)
            <div style="background: #fff3cd; padding: 24px; border-radius: 12px; border: 1px solid #ffc107;">
                <strong>NIM Anda:</strong> {{ $pendaftaran->nim }}
            </div>
        @endif
        @if($pendaftaran && $tahap >= 5)
            @php $paidAwal = $user->payments()->where('jenis', 'awal')->whereIn('status', ['capture', 'settlement'])->exists(); @endphp
            @if(!$paidAwal)
                <a href="{{ route('payment.awal') }}" style="display: block; background: #6f42c1; color: #fff; padding: 24px; border-radius: 12px; text-align: center; font-weight: 600; text-decoration: none;">
                    <i class="fas fa-money-bill-wave" style="font-size: 2rem; margin-bottom: 8px;"></i><br>
                    Bayar Biaya Tahap Awal (Dapat NIM)
                </a>
            @endif
        @endif
    </div>
</div>
@endsection
