<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'jenis',
        'jumlah',
        'snap_token',
        'status',
        'transaction_id',
        'paid_at',
        'metadata',
    ];

    protected $casts = [
        'jumlah' => 'decimal:2',
        'paid_at' => 'datetime',
        'metadata' => 'array',
    ];

    public const JENIS_REGISTRASI = 'registrasi';
    public const JENIS_AWAL = 'awal';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
