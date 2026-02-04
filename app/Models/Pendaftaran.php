<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    
    protected $fillable = [
        'user_id',
        'jalur_pendaftaran_id',
        'program_studi_id',
        'tahap',
        'tes_selesai',
        'nilai_tes',
        'tes_dikerjakan_at',
        'biodata_lengkap',
        'dokumen_terverifikasi',
        'nim',
        'gelombang',
    ];

    protected $casts = [
        'tes_dikerjakan_at' => 'datetime',
        'tes_selesai' => 'boolean',
        'biodata_lengkap' => 'boolean',
        'dokumen_terverifikasi' => 'boolean',
        'nilai_tes' => 'decimal:2',
    ];

    public const TAHAP_REGISTERED = 1;
    public const TAHAP_PAID = 2;
    public const TAHAP_TES_DONE = 3;
    public const TAHAP_APPLICANT = 4;
    public const TAHAP_ACCEPTED = 5;
    public const TAHAP_RE_REGISTRATION = 6;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jalurPendaftaran(): BelongsTo
    {
        return $this->belongsTo(JalurPendaftaran::class, 'jalur_pendaftaran_id');
    }

    public function programStudi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi_id');
    }

    public function biodata(): HasOne
    {
        return $this->hasOne(BiodataCamaba::class, 'pendaftaran_id');
    }

    public function dokumen(): HasMany
    {
        return $this->hasMany(DokumenPendaftaran::class, 'pendaftaran_id');
    }

    public function jawabanTes(): HasMany
    {
        return $this->hasMany(JawabanTes::class, 'pendaftaran_id');
    }

    public function hasPaidRegistration(): bool
    {
        return $this->user->payments()
            ->where('jenis', 'registrasi')
            ->where('status', 'capture')
            ->exists();
    }

    public function getTahapLabelAttribute(): string
    {
        return match ((int) $this->tahap) {
            self::TAHAP_REGISTERED => 'Terdaftar',
            self::TAHAP_PAID => 'Sudah Bayar Registrasi',
            self::TAHAP_TES_DONE => 'Tes Selesai',
            self::TAHAP_APPLICANT => 'Biodata & Dokumen',
            self::TAHAP_ACCEPTED => 'Diterima',
            self::TAHAP_RE_REGISTRATION => 'Daftar Ulang (NIM)',
            default => 'Tahap ' . $this->tahap,
        };
    }
}
