<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //looping dummy data barang
        for($s=1;$s<=10;$s++){
            DB::table('buku')->insert(
            [
                'kode'=>Str::random(3),
                'judul'=>uniqid('ebook_'),
                'kategori_id'=>'4',
                'penerbit_id'=>'4',
                'isbn'=>Str::random(13),
                'pengarang'=>uniqid('pengarang_'),
                'jumlah_halaman'=>10,
                'sinopsis'=>'Sinopsis',
                'rating'=>3,
                'harga'=>100000,
                'url_buku'=>Str::random(20),
                //'created_at' => new \DateTime,
            ]);
        }
    }
}
