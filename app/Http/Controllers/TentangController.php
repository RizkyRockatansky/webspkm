<?php

namespace App\Http\Controllers;
use App\Tentang; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TentangController extends Controller
{
    public function index()
    {
    	// mengambil data dari table mahasiswa
    	$tentang = DB::table('tb_tentang')->get();
        // dd($mahasiswa);
 
    	// mengirim data pegawai ke view index
    	return view('/tentang/index',['tentang' => $tentang]);
 
    }

    public function create()
    {
    	return view('tentang/index');
 
    }

    public function store(Request $request)
    {
    	DB::table('tb_tentang')->insert([
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/tentang/index')->with('message', 'Tambah Tentang telah Behasil!'); 
    }

    public function edit($id)
    {
    	$tentang = DB::table('tb_tentang')->where('id_tentang',$id)->get;

        return view('edit',['tb_tentang' => $tentang]); 
    }

    public function update(Request $request)
    {
    	DB::table('tb_tentang')->where('id_tentang',$request->id)->update([
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/tentang/index')->with('message', 'Edit Tentang telah Behasil!'); 
    }

    public function delete($id)
    {
    	$tentang = Tentang::find($id);
        $tentang->delete();
        return redirect('/tentang/index')->with('message', 'Hapus Tentang telah Behasil!'); 
    }
}
