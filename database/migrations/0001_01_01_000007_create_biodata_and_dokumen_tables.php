<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biodata_camaba', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->cascadeOnDelete();
            $table->string('nik', 20)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin', 1)->nullable();
            $table->text('alamat')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('tahun_lulus', 4)->nullable();
            $table->timestamps();
        });

        Schema::create('dokumen_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->cascadeOnDelete();
            $table->string('jenis')->comment('foto, ijazah, ktp, dll sesuai jalur');
            $table->string('path');
            $table->string('nama_file');
            $table->boolean('terverifikasi')->default(false);
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });

        Schema::create('jawaban_tes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->cascadeOnDelete();
            $table->foreignId('soal_tes_id')->constrained('soal_tes')->cascadeOnDelete();
            $table->string('jawaban', 1);
            $table->boolean('benar');
            $table->timestamps();
            $table->unique(['pendaftaran_id', 'soal_tes_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jawaban_tes');
        Schema::dropIfExists('dokumen_pendaftaran');
        Schema::dropIfExists('biodata_camaba');
    }
};
