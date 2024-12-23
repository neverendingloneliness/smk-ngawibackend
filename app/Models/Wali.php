<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wali extends Model
{
    /** @use HasFactory<\Database\Factories\WaliFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'nama_wali',
        'nomor_tepon_wali',
        'pekerjaan',
        'alamat'
    ];

    public function wali(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
