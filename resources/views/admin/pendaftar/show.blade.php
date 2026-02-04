@extends('layouts.admin')

@section('title', 'Detail Pendaftar')
@section('page-title', 'Detail Pendaftar')

@section('content')
<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Pendaftar #{{ $pendaftar->id }}</h2>
                <a href="{{ route('admin.pendaftar.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Informasi Pendaftar</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr><td>ID Pendaftaran:</td><td>{{ $pendaftar->id }}</td></tr>
                        <tr><td>Nama:</td><td>{{ $pendaftar->user->name }}</td></tr>
                        <tr><td>Email:</td><td>{{ $pendaftar->user->email }}</td></tr>
                        <tr><td>HP:</td><td>{{ $pendaftar->user->phone ?? '-' }}</td></tr>
                        <tr><td>Jalur:</td><td>{{ $pendaftar->jalurPendaftaran->nama ?? '-' }}</td></tr>
                        <tr><td>Program Studi:</td><td>{{ $pendaftar->programStudi->nama ?? '-' }}</td></tr>
                        <tr><td>Tahap:</td><td><span class="badge bg-primary">Tahap {{ $pendaftar->tahap }}</span></td></tr>
                        <tr><td>NIM:</td><td>{{ $pendaftar->nim ?? '-' }}</td></tr>
                        <tr><td>Nilai Tes:</td><td>{{ $pendaftar->nilai_tes ?? '-' }}</td></tr>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Status Dokumen</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr><td>Biodata Lengkap:</td><td>{{ $pendaftar->biodata_lengkap ? '✅ Ya' : '❌ Belum' }}</td></tr>
                        <tr><td>Dokumen Terverifikasi:</td><td>{{ $pendaftar->dokumen_terverifikasi ? '✅ Ya' : '❌ Belum' }}</td></tr>
                        <tr><td>Tes Selesai:</td><td>{{ $pendaftar->tes_selesai ? '✅ Ya' : '❌ Belum' }}</td></tr>
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
                    <form method="POST" action="{{ route('admin.pendaftar.update-status', $pendaftar->id) }}" class="mb-2">
                        @csrf
                        <input type="hidden" name="tahap" value="{{ min($pendaftar->tahap + 1, 6) }}">
                        <button type="submit" class="btn btn-success w-100">Update Tahap</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
