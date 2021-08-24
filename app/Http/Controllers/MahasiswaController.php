<?php
 
namespace App\Http\Controllers;
use App\Mahasiswa; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class MahasiswaController extends Controller
{
    public function index()
    {
    	// mengambil data dari table mahasiswa
    	$hitung = count($mahasiswa = DB::table('tb_mahasiswa')->get());
        $mahasiswa = DB::table('tb_mahasiswa')->get();
        // dd($hitung);
 
    	// mengirim data pegawai ke view index
    	return view('/mahasiswa/index',['mahasiswa' => $mahasiswa]);
 
    }

    public function create()
    {
    	return view('mahasiswa/index');
 
    }

    public function store(Request $request)
    {
    	DB::table('tb_mahasiswa')->insert([
            'nama_mhs' => $request->nama_mhs,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/mahasiswa/index')->with('message', 'Tambah Mahasiswa telah Behasil!'); 
    }

    public function edit($id)
    {
    	$mahasiswa = DB::table('tb_mahasiswa')->where('id_mhs',$id)->get;

        return view('edit',['tb_mahasiswa' => $mahasiswa]); 
    }

    public function update(Request $request)
    {
    	DB::table('tb_mahasiswa')->where('id_mhs',$request->id)->update([
            'nama_mhs' => $request->nama_mhs,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/mahasiswa/index')->with('message', 'Edit Mahasiswa telah Behasil!'); 
    }

    public function delete($id)
    {
    	$mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect('/mahasiswa/index')->with('message', 'Hapus Mahasiswa telah Behasil!'); 
    }

}