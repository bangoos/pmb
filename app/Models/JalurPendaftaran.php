<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JalurPendaftaran extends Model
{
    protected $table = 'jalur_pendaftaran';

    protected $fillable = [
        'nama',
        'kode',
        'diskon_spp',
        'syarat_dokumen',
        'deskripsi',
        'aktif',
        'urutan',
    ];

    protected $casts = [
        'syarat_dokumen' => 'array',
        'diskon_spp' => 'decimal:2',
        'aktif' => 'boolean',
    ];

    public function pendaftaran(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'jalur_pendaftaran_id');
    }
}
