<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';

    protected $fillable = [
        'nama',
        'kode',
        'fakultas',
        'deskripsi',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function pendaftaran(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'program_studi_id');
    }
}
