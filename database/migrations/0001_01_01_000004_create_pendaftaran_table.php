<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('jalur_pendaftaran_id')->nullable()->constrained('jalur_pendaftaran')->nullOnDelete();
            $table->foreignId('program_studi_id')->nullable()->constrained('program_studi')->nullOnDelete();
            $table->enum('tahap', [1, 2, 3, 4, 5, 6])->default(1)->comment('1=registered,2=paid,3=tes_done,4=applicant,5=accepted,6=re_registration');
            $table->boolean('tes_selesai')->default(false);
            $table->decimal('nilai_tes', 8, 2)->nullable();
            $table->timestamp('tes_dikerjakan_at')->nullable();
            $table->boolean('biodata_lengkap')->default(false);
            $table->boolean('dokumen_terverifikasi')->default(false);
            $table->string('nim')->nullable();
            $table->string('gelombang', 50)->nullable();
            $table->timestamps();
            $table->unique(['user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
