<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendaftaran extends Model
{
    /** @use HasFactory<\Database\Factories\PendaftaranFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'jurusan_id',
        'tanggal_pendafaran',
        'status_pendaftaran',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }
    
    public function announcement(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }
}
