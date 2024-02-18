<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjambuku extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    protected $table = 'bookings';

    protected $fillable = [
        'nama_peminjam',
        'judul',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status' 
    ];
}
