<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Artikel extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'dokumentasi',
        'fotografer',
        'penulis',
        'redaktur',
        'tanggal_posting',
        'isi',
        'kategori',
        'view_count',
    ];
    protected $casts = [
        'tanggal_posting' => 'datetime',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artikel) {
            $artikel->slug = Str::slug($artikel->judul);
        });

        static::updating(function ($artikel) {
            $artikel->slug = Str::slug($artikel->judul);
        });
    }
}
