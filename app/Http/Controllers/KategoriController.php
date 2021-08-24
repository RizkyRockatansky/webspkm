<?php
 
namespace App\Http\Controllers;
use App\Kategori; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class KategoriController extends Controller
{
    public function index()
    {
    	// mengambil data dari table kategori
    	$hitung_k = count($kategori = DB::table('tb_kategori')->get());
        $kategori = DB::table('tb_kategori')->get();
 
    	// mengirim data pegawai ke view index
    	return view('/kategori/index',['kategori' => $kategori]);
 
    }

    public function create()
    {
    	return view('kategori/index');
 
    }

    public function store(Request $request)
    {
    	DB::table('tb_kategori')->insert([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('/kategori/index')->with('message', 'Tambah Kategori telah Behasil!'); 
        // return redirect()->back()->with('message', 'Tambah Kategori telah Behasil!');

    }

    public function edit($id)
    {
    	$kategori = DB::table('tb_kategori')->where('id_kategori',$id)->get;

        return view('edit',['tb_kategori' => $kategori]); 
    }

    public function update(Request $request)
    {
    	DB::table('tb_kategori')->where('id_kategori',$request->id)->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('/kategori/index')->with('message', 'Edit Kategori telah Berhasil!'); 
    }

    public function delete($id)
    {
    	$kategori = kategori::find($id);
        $kategori->delete();
        return redirect('/kategori/index')->with('message', 'Hapus Kategori telah Berhasil!'); 
    }

}