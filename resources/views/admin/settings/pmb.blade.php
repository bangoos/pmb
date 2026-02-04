@extends('layouts.admin')

@section('title', 'Pengaturan PMB')
@section('page-title', 'Pengaturan PMB')

@section('content')
<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-12">
            <h2>Pengaturan PMB</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('admin.settings.update-pmb') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5>Konfigurasi PMB</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Biaya Registrasi (Rp)</label>
                                    <input type="number" name="biaya_registrasi" class="form-control" value="{{ $settings['biaya_registrasi'] }}" min="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Biaya Tahap Awal (Rp)</label>
                                    <input type="number" name="biaya_awal" class="form-control" value="{{ $settings['biaya_awal'] }}" min="0">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h6>Midtrans Configuration</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Server Key</label>
                                    <input type="text" name="midtrans_server_key" class="form-control" value="{{ $settings['midtrans_server_key'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Client Key</label>
                                    <input type="text" name="midtrans_client_key" class="form-control" value="{{ $settings['midtrans_client_key'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="midtrans_is_production" class="form-check-input" {{ $settings['midtrans_is_production'] ? 'checked' : '' }}>
                                <label class="form-check-label">Production Mode</label>
                            </div>
                        </div>

                        <hr>

                        <h6>WhatsApp Gateway</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Gateway URL</label>
                                    <input type="url" name="wa_gateway_url" class="form-control" value="{{ $settings['wa_gateway_url'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Gateway Token</label>
                                    <input type="text" name="wa_gateway_token" class="form-control" value="{{ $settings['wa_gateway_token'] }}">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Pengaturan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Informasi</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Pengaturan ini akan mempengaruhi seluruh sistem PMB. Pastikan data yang dimasukkan sudah benar.
                    </p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Perubahan pengaturan akan memerlukan restart cache untuk berlaku.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
