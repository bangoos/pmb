@extends('layouts.admin')

@section('title', 'Edit Soal Tes')
@section('page-title', 'Edit Soal Tes')

@section('content')
<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Edit Soal Tes #{{ $soal->id }}</h2>
                <a href="{{ route('admin.tests.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('admin.tests.update', $soal->id) }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Soal Tes</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Pertanyaan *</label>
                            <textarea name="pertanyaan" class="form-control" rows="4" required>{{ old('pertanyaan', $soal->pertanyaan) }}</textarea>
                            @error('pertanyaan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilihan A *</label>
                            <input type="text" name="pilihan_a" class="form-control" value="{{ old('pilihan_a', $soal->pilihan_a) }}" required>
                            @error('pilihan_a')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilihan B *</label>
                            <input type="text" name="pilihan_b" class="form-control" value="{{ old('pilihan_b', $soal->pilihan_b) }}" required>
                            @error('pilihan_b')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilihan C *</label>
                            <input type="text" name="pilihan_c" class="form-control" value="{{ old('pilihan_c', $soal->pilihan_c) }}" required>
                            @error('pilihan_c')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilihan D *</label>
                            <input type="text" name="pilihan_d" class="form-control" value="{{ old('pilihan_d', $soal->pilihan_d) }}" required>
                            @error('pilihan_d')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Jawaban Benar *</label>
                                    <select name="jawaban_benar" class="form-select" required>
                                        <option value="">Pilih Jawaban</option>
                                        <option value="a" {{ old('jawaban_benar', $soal->jawaban_benar) == 'a' ? 'selected' : '' }}>A</option>
                                        <option value="b" {{ old('jawaban_benar', $soal->jawaban_benar) == 'b' ? 'selected' : '' }}>B</option>
                                        <option value="c" {{ old('jawaban_benar', $soal->jawaban_benar) == 'c' ? 'selected' : '' }}>C</option>
                                        <option value="d" {{ old('jawaban_benar', $soal->jawaban_benar) == 'd' ? 'selected' : '' }}>D</option>
                                    </select>
                                    @error('jawaban_benar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Bobot *</label>
                                    <input type="number" name="bobot" class="form-control" value="{{ old('bobot', $soal->bobot) }}" min="1" max="100" required>
                                    @error('bobot')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.tests.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Soal
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
