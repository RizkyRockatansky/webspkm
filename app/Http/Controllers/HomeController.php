<?php

namespace App\Http\Controllers;

use App\Mahasiswa; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$hitung = count($mahasiswa = DB::table('tb_mahasiswa')->get());
        $hitung_k = count($kategori = DB::table('tb_kategori')->get());
        $hitung_m = count($admin = DB::table('tb_admin')->get());

        return view('home',[
            'hitung' => $hitung,
            'hitung_k' => $hitung_k,
            'hitung_m' => $hitung_m,
                    
        ]);
        

    }
    
}