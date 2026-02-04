<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BiodataCamaba extends Model
{
    protected $table = 'biodata_camaba';

    protected $fillable = [
        'pendaftaran_id',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'asal_sekolah',
        'tahun_lulus',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
