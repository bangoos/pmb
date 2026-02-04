<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JawabanTes extends Model
{
    protected $table = 'jawaban_tes';

    protected $fillable = [
        'pendaftaran_id',
        'soal_tes_id',
        'jawaban',
        'benar',
    ];

    protected $casts = [
        'benar' => 'boolean',
    ];

    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    public function soalTes(): BelongsTo
    {
        return $this->belongsTo(SoalTes::class, 'soal_tes_id');
    }
}
