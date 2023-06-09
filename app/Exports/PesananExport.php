<?php

namespace App\Exports;

use App\Models\Pesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PesananExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_pesanan = Pesanan::join('buku', 'buku.id', '=', 'pesanan.buku_id')
            ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.pelanggan_id')
            ->select('pesanan.kode', 'pelanggan.nama','buku.judul', 'pesanan.tgl', 'pesanan.ket'  )
            ->get();
        return $ar_pesanan;
    }

    public function headings(): array
    {
        return ["Kode", "Pelanggan", "Buku", "Tanggal", "Keterangan"];
    }
}
