<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class BukuExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Buku::all();
        $ar_buku = Buku::join('kategori', 'kategori.id', '=', 'buku.kategori_id')
        ->join('penerbit', 'penerbit.id', '=', 'buku.penerbit_id')
        ->select('buku.kode', 'buku.judul', 'kategori.nama as kategori', 'penerbit.nama as penerbit', 'buku.isbn', 
                'buku.pengarang', 'buku.jumlah_halaman', 'buku.sinopsis', 'buku.rating', 'buku.harga', 'buku.diskon', 
                'buku.foto','buku.url_buku')
        ->get();
        return $ar_buku;

    }

    public function headings(): array
    {
        return ["Kode", "Judul", "Kategori", "Penerbit", "ISBN", "Pengarang", "Jumlah Halaman", "Sinopsis", "Rating", "Harga", "Diskon", "foto", "Url Buku"];
    }
}
