<?php

namespace App\Http\Controllers;

use App\Models\Kategori; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //query builder

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_kategori = DB::table('kategori')
                ->select('kategori.*')
                ->orderBy('kategori.id', 'desc')
                ->get();
        return view('kategori.index', compact('ar_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //arahkan ke form input data
        return view('kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate([
            'nama' => 'required|max:45',
        ],
        //custom pesan errornya
        [
            'nama.required'=>'Kategori Wajib Diisi',
            'nama.max'=>'Kategori Maksimal 45 karakter',
        ]
        );

        //lakukan insert data dari request form
        try{
        DB::table('kategori')->insert(
            [
                'nama'=>$request->nama,
            ]);
       
        return redirect()->route('kategori.index')
                        ->with('success','Data Kategori Baru Berhasil Disimpan');
    }
        catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('kategori.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
    }  
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //tampilkan data lama di form
        $row = Kategori::find($id);
        return view('kategori.form_edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate([
            'nama' => 'required|max:45',
        ],
        //custom pesan errornya
        [
            'nama.required'=>'Kategori Wajib Diisi',
            'nama.max'=>'Kategori Maksimal 45 karakter',
        ]
        );

        //lakukan insert data dari request form
        DB::table('kategori')->where('id',$id)->update(
            [
                'nama'=>$request->nama,
            ]);
       
        return redirect()->route('kategori.index')
                        ->with('success','Data Kategori Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori.index')
                        ->with('success','Data Kategori Berhasil Dihapus');
    }

}