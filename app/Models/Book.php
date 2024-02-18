<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function pinjambuku()
    {
        return $this->hasMany(Pinjambuku::class);
    }

    protected $fillable = [
        'judul',
        'penerbit',
        'kategori',
        'deskripsi',
        'image'
    ];
}
