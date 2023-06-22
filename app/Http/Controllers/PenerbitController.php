<?php

namespace App\Http\Controllers;

use App\Models\Penerbit; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //query builder

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_penerbit = DB::table('penerbit')
                ->select('penerbit.*')
                ->orderBy('penerbit.id', 'desc')
                ->get();
        return view('penerbit.index', compact('ar_penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //arahkan ke form input data
        return view('penerbit.form');
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
            'nama.required'=>'Penerbit Wajib Diisi',
            'nama.max'=>'Penerbit Maksimal 45 karakter',
        ]
        );

        //lakukan insert data dari request form
        try{
        DB::table('penerbit')->insert(
            [
                'nama'=>$request->nama,
            ]);
       
        return redirect()->route('penerbit.index')
                        ->with('success','Data Penerbit Baru Berhasil Disimpan');
    }
    catch (\Exception $e){
        //return redirect()->back()
        return redirect()->route('penerbit.index')
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
        $row = Penerbit::find($id);
        return view('penerbit.form_edit',compact('row'));
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
            'nama.required'=>'Penerbit Wajib Diisi',
            'nama.max'=>'Penerbit Maksimal 45 karakter',
        ]
        );

        //lakukan insert data dari request form
        DB::table('penerbit')->where('id',$id)->update(
            [
                'nama'=>$request->nama,
            ]);
       
        return redirect()->route('penerbit.index')
                        ->with('success','Data Penerbit Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penerbit = Penerbit::find($id);
        $penerbit->delete();
        return redirect()->route('penerbit.index')
                        ->with('success','Data Penerbit Berhasil Dihapus');
    }

}