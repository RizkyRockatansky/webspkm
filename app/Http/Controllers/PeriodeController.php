<?php
 
namespace App\Http\Controllers;
use App\Periode; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class PeriodeController extends Controller
{
    public function index()
    {
    	// mengambil data dari table mahasiswa
    	$periode = DB::table('tb_periode')->get();
        // dd($mahasiswa);
 
    	// mengirim data pegawai ke view index
    	return view('/periode/index',['periode' => $periode]);
 
    }

    public function create()
    {
    	return view('periode/index');
 
    }

    public function store(Request $request)
    {
    	DB::table('tb_periode')->insert([
            'nama_periode' => $request->nama_periode,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/periode/index')->with('message', 'Tambah Periode telah Behasil!'); 
    }

    public function edit($id)
    {
    	$periode = DB::table('tb_periode')->where('id_periode',$id)->get;

        return view('edit',['tb_periode' => $periode]); 
    }

    public function update(Request $request)
    {
    	DB::table('tb_periode')->where('id_periode',$request->id)->update([
            'nama_periode' => $request->nama_periode,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/periode/index')->with('message', 'Edit Periode telah Behasil!'); 
    }

    public function delete($id)
    {
    	$periode = Periode::find($id);
        $periode->delete();
        return redirect('/periode/index')->with('message', 'Hapus Periode telah Behasil!'); 
    }

}