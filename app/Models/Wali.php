<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use illuminate\Support\Str;

class Wali extends Model
{
    /** @use HasFactory<\Database\Factories\WaliFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_wali',
        'slug_wali',
        'nomor_telepon',
        'pekerjaan',
        'alamat'
    ];

    public function getRouteKeyName() {
        return 'slug_wali' ;
    }

    public function setNamaWaliAttribute($value){
        $this->attributes['nama_wali'] = $value;
        $this->attributes['slug_wali'] = Str::slug($value);
    }

    
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
