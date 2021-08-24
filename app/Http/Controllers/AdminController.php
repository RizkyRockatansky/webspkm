<?php
 
namespace App\Http\Controllers;
use App\Admin; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class AdminController extends Controller
{
    public function index()
    {
    	// mengambil data dari table mahasiswa
        $hitung_m = count($admin = DB::table('tb_admin')->get());
    	$admin = DB::table('tb_admin')->get();
        // dd($mahasiswa);
 
    	// mengirim data pegawai ke view index
    	return view('/admin/index',['admin' => $admin]);
 
    }

    public function create()
    {
    	return view('admin/index');
 
    }

    public function store(Request $request)
    {
    	DB::table('tb_admin')->insert([
            'nama_admin' => $request->nama_admin,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/admin/index')->with('message', 'Tambah Admin telah Behasil!'); 
    }

    public function edit($id)
    {
    	$admin = DB::table('tb_admin')->where('id_admin',$id)->get;

        return view('edit',['tb_admin' => $admin]); 
    }

    public function update(Request $request)
    {
    	DB::table('tb_admin')->where('id_admin',$request->id)->update([
            'nama_admin' => $request->nama_admin,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/admin/index')->with('message', 'Edit Admin telah Behasil!'); 
    }

    public function delete($id)
    {
    	$admin = Admin::find($id);
        $admin->delete();
        return redirect('/admin/index')->with('message', 'Hapus Admin telah Behasil!'); 
    }

}