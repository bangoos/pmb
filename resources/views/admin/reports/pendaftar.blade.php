@extends('layouts.admin')

@section('title', 'Laporan Pendaftar')
@section('page-title', 'Laporan Pendaftar')

@section('content')
<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Laporan Pendaftar</h2>
                <div>
                    <a href="{{ route('admin.reports.export.pendaftar') }}" class="btn btn-success">
                        <i class="fas fa-download me-2"></i>Export CSV
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5>Filter Laporan</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.reports.pendaftar') }}">
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
                        <label class="form-label">Program Studi</label>
                        <select name="program_studi_id" class="form-select">
                            <option value="">Semua Prodi</option>
                            @foreach($prodi_options as $id => $nama)
                            <option value="{{ $id }}" {{ request('program_studi_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tahap</label>
                        <select name="tahap" class="form-select">
                            <option value="">Semua</option>
                            @for($i = 1; $i <= 6; $i++)
                            <option value="{{ $i }}" {{ request('tahap') == $i ? 'selected' : '' }}>Tahap {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tanggal Dari</label>
                        <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tanggal Sampai</label>
                        <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search me-2"></i>Filter
                        </button>
                        <a href="{{ route('admin.reports.pendaftar') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Data Pendaftar</h5>
        </div>
        <div class="card-body">
            @if($pendaftar->count() > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jalur</th>
                            <th>Program Studi</th>
                            <th>Tahap</th>
                            <th>Nilai Tes</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftar as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->jalurPendaftaran->nama ?? '-' }}</td>
                            <td>{{ $item->programStudi->nama ?? '-' }}</td>
                            <td><span class="badge bg-primary">Tahap {{ $item->tahap }}</span></td>
                            <td>{{ $item->nilai_tes ?? '-' }}</td>
                            <td>
                                @if($item->biodata_lengkap && $item->dokumen_terverifikasi)
                                    <span class="badge bg-success">Lengkap</span>
                                @else
                                    <span class="badge bg-warning">Proses</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-4">
                <p class="text-muted">Tidak ada data pendaftar dengan filter yang dipilih</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
