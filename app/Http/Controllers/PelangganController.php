<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //query builder
use App\Exports\PelangganExport;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_pelanggan = DB::table('users')
                ->select('users.*')
                ->where('role', '=', 'Pelanggan')
                ->orderBy('users.id', 'desc')
                ->get();
        return view('pelanggan.index', compact('ar_pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //arahkan ke form input data
        return view('pelanggan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate([
            'name' => 'required|max:45',
            'email' => 'required|max:45',
            'password' => 'required|max:45',
            'hp' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,svg|min:2|max:500', //KB
        ],
        //custom pesan errornya
        [
            'name.required'=>'Nama Wajib Diisi',
            'name.max'=>'Nama Maksimal 45 karakter',
            'email.required'=>'Email Wajib Diisi',
            'email.max'=>'Email Maksimal 45 karakter',
            'password.required'=>'Password Wajib Diisi',
            'password.max'=>'Password Maksimal 45 karakter',
            'hp.required'=>'Nomor HP Wajib Diisi',
            'hp.regex'=>'Nomor HP harus berupa angka',
            'foto.min'=>'Ukuran file kurang 2 KB',
            'foto.max'=>'Ukuran file melebihi 500 KB',
            'foto.image'=>'File foto bukan gambar',
            'foto.mimes'=>'Extension file selain jpg,jpeg,png,svg',
        ]
        );

        //------------apakah user ingin upload foto--------- --
        if(!empty($request->foto)){
            $fileName = 'user_'.$request->name.'.'.$request->foto->extension();
            $request->foto->move(public_path('landingpage/img'),$fileName);
        }
        else{
            $fileName = '';
        }

        //lakukan insert data dari request form
        try{
        DB::table('users')->insert(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'hp'=>$request->hp,
                'foto'=>$fileName,
            ]);
       
        return redirect()->route('pelanggan.index')
                        ->with('success','Data Pelanggan Baru Berhasil Disimpan');
    }
        catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('pelanggan.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }  
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = User::find($id);
        return view('pelanggan.detail', compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //tampilkan data lama di form
        $row = User::find($id);
        return view('pelanggan.form_edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate([
            'name' => 'required|max:45',
            'email' => 'required|max:45',
            'password' => 'required|max:45',
            'hp' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,svg|min:2|max:500', //KB
        ],
        //custom pesan errornya
        [
            'name.required'=>'Nama Wajib Diisi',
            'name.max'=>'Nama Maksimal 45 karakter',
            'email.required'=>'Email Wajib Diisi',
            'email.max'=>'Email Maksimal 45 karakter',
            'password.required'=>'Password Wajib Diisi',
            'password.max'=>'Password Maksimal 45 karakter',
            'hp.required'=>'Nomor HP Wajib Diisi',
            'hp.regex'=>'Nomor HP harus berupa angka',
            'foto.min'=>'Ukuran file kurang 2 KB',
            'foto.max'=>'Ukuran file melebihi 500 KB',
            'foto.image'=>'File foto bukan gambar',
            'foto.mimes'=>'Extension file selain jpg,jpeg,png,svg',
        ]
        );

        //------------ambil foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('users')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user  ingin ubah upload foto baru--------- --
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($namaFileFotoLama)) unlink('landingpage/img/'.$namaFileFotoLama);

            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'user_'.$request->kode.'.'.$request->foto->extension();
            $request->foto->move(public_path('landingpage/img'),$fileName);
        }
        else{
            $fileName = $namaFileFotoLama;
        }

        //lakukan insert data dari request form
        DB::table('users')->where('id',$id)->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'hp'=>$request->hp,
                'foto'=>$fileName,
            ]);
       
        return redirect('/pelanggan'.'/'.$id)
            ->with('success','Data Pelanggan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = User::find($id);
        if (!empty($pelanggan->foto)) {
            $fotoPath = public_path('landingpage/img/'.$pelanggan->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $pelanggan->delete();
        return redirect()->route('pelanggan.index')
                        ->with('success', 'Data Pelanggan Berhasil Dihapus');
    }
}