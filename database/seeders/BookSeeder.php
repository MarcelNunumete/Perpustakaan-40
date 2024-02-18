<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'judul' => 'Perahu Kertas',
            'penerbit' => 'Agastya',
            'kategori' => 'Fiksi',
            'deskripsi' => 'Banyak',
        ]);
    }
}
