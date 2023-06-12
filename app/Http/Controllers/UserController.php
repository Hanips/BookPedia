<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //query builder
use App\Exports\PelangganExport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_user = DB::table('users')
                ->select('users.*')
                ->orderBy('users.role', 'desc')
                ->get();
        return view('user.index', compact('ar_user'));
    }

    public function dataUser()
    {
        $user = auth()->user();

        return view('landingpage.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enumValues = DB::table('information_schema.columns')
                        ->select('column_type')
                        ->where('table_name', '=', 'users')
                        ->where('column_name', '=', 'role')
                        ->first()
                        ->column_type;

        preg_match("/^enum\(\'(.*)\'\)$/", $enumValues, $matches);
        $enumOptions = explode("','", $matches[1]);

        return view('user.form', ['enumOptions' => $enumOptions]);
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
            'role' => 'required',
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
            'role.required'=>'Role Wajib Diisi',
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
        DB::table('users')->insert(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password' => bcrypt($request['password']),
                'role'=>$request->role,
                'hp'=>$request->hp,
                'foto'=>$fileName,
            ]);
       
        return redirect()->route('user.index')
                        ->with('success','Data User Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = User::find($id);
        return view('user.detail', compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enumValues = DB::table('information_schema.columns')
                        ->select('column_type')
                        ->where('table_name', '=', 'users')
                        ->where('column_name', '=', 'role')
                        ->first()
                        ->column_type;

        preg_match("/^enum\(\'(.*)\'\)$/", $enumValues, $matches);
        $enumOptions = explode("','", $matches[1]);

        // Tampilkan data lama di form
        $row = User::find($id);

        return view('user.form_edit', compact('row', 'enumOptions'));
    }

    public function ubahProfil(string $id)
    {
        // Tampilkan data lama di form
        $row = User::find($id);
        return view('landingpage.profile_edit', compact('row'));
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
            'password' => 'required',
            'role' => 'required',
            'hp' => 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,svg|min:2|max:500', //KB
        ],
        //custom pesan errornya
        [
            'name.required'=>'Nama Wajib Diisi',
            'name.max'=>'Nama Maksimal 45 karakter',
            'email.required'=>'Email Wajib Diisi',
            'email.max'=>'Email Maksimal 45 karakter',
            'password.required'=>'Password Wajib Diisi',
            'role.required'=>'Role Wajib Diisi',
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
                'password' => bcrypt($request['password']),
                'role'=>$request->role,
                'hp'=>$request->hp,
                'foto'=>$fileName,
            ]);
       
        $previousUrl = url()->previous();
        if (strpos($previousUrl, '/user'.'/'.$id.'/edit') !== false) {
            // Jika pada halaman admin
            return redirect('/user'.'/'.$id)->with('success','Data User Berhasil Diubah');
        } else {
            // Jika pada halaman landingpage
            return redirect('/profile')->with('success', 'Profil Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!empty($user->foto)) {
            $fotoPath = public_path('landingpage/img/'.$user->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $user->delete();
        return redirect()->route('user.index')
                        ->with('success', 'Data User Berhasil Dihapus');
    }
}