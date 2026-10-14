<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peserta extends Model
{
    protected $fillable = [
        'user_id',
        'nik',
        'nama',
        'email',
        'no_hp',
        'alamat',
        'skema_id',
    ];

    public function skema(): BelongsTo
    {
        return $this->belongsTo(Skema::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
