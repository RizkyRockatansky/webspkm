<?php

namespace App\Http\Controllers;
use App\Fuzzyfikasi; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuzzyfikasiController extends Controller
{
    public function index(Request $request, HasilKuisioner $hasilKuisioner)
    {
    	
    	$fuzzyfikasi = Fuzzyfikasi::all() ;
        
        $hasilkuisioner = HasilKuisioner::all();
        $kuisioner = Kuisioner::all();
        $kategori = Kategori::all();
 
        //harapan : tidak puas
        $tp = [];
        //harapan : kurang puas
        $kp = [];
        //harapan : cukup puas
        $cp = [];
        //harapan : puas
        $p = [];
        //harapan : sangat puas
        $sp = [];

        //persepsi : tidak puas
        $tpp = [];
        //persepsi : kurang puas
        $kpp = [];
        //persepsi : cukup puas
        $cpp = [];
        //persepsi : puas
        $pp = [];
        //persepsi : sangat puas
        $spp = [];

        //fuzzyfikasi
        $bbh = [];
        $bth = [];
        $bah = [];
        $bbp = [];
        $btp = [];
        $bap = [];
        $defuzzyh = [];
        $defuzzyp = [];
        $jumlah = Kuisioner::count();
        
        for ($i = 1; $i <= $jumlah; $i++) {
            
            $tpp_count = DB::table('tb_hasil_kuisioner')
                    ->join('tb_kuisioner', 'tb_hasil_kuisioner.id_kuis', '=', 'tb_kuisioner.id_kuis')
                    ->where('tb_kuisioner.kode_kuis', '=', 'P'.$i)
                    ->where('tb_hasil_kuisioner.jawaban_persepsi', '=', '1')->count();
                array_push($tpp, $tpp_count);

                $kpp_count  = DB::table('tb_hasil_kuisioner')
                    ->join('tb_kuisioner', 'tb_hasil_kuisioner.id_kuis', '=', 'tb_kuisioner.id_kuis')
                    ->where('tb_kuisioner.kode_kuis', '=', 'P'.$i)
                    ->where('tb_hasil_kuisioner.jawaban_persepsi', '=', '2')->count();
                array_push($kpp, $kpp_count);

                $cpp_count  = DB::table('tb_hasil_kuisioner')
                    ->join('tb_kuisioner', 'tb_hasil_kuisioner.id_kuis', '=', 'tb_kuisioner.id_kuis')
                    ->where('tb_kuisioner.kode_kuis', '=', 'P'.$i)
                    ->where('tb_hasil_kuisioner.jawaban_persepsi', '=', '3')->count();
                array_push($cpp, $cpp_count);

                $pp_count   = DB::table('tb_hasil_kuisioner')
                    ->join('tb_kuisioner', 'tb_hasil_kuisioner.id_kuis', '=', 'tb_kuisioner.id_kuis')
                    ->where('tb_kuisioner.kode_kuis', '=', 'P'.$i)
                    ->where('tb_hasil_kuisioner.jawaban_persepsi', '=', '4')->count();
                array_push($pp, $pp_count);

                $spp_count  = DB::table('tb_hasil_kuisioner')
                    ->join('tb_kuisioner', 'tb_hasil_kuisioner.id_kuis', '=', 'tb_kuisioner.id_kuis')
                    ->where('tb_kuisioner.kode_kuis', '=', 'P'.$i)
                    ->where('tb_hasil_kuisioner.jawaban_persepsi', '=', '5')->count();
                array_push($spp, $spp_count);

            //harapan
            $tp_count = DB::table('tb_hasil_kuisioner')
                ->join('tb_kuisioner', 'tb_hasil_kuisioner.id_kuis', '=', 'tb_kuisioner.id_kuis')
                ->where('tb_kuisioner.kode_kuis', '=', 'P'.$i)
                ->where('tb_hasil_kuisioner.jawaban_harapan', '=', '1')->count();
            array_push($tp, $tp_count);

            $kp_count  = DB::table('tb_hasil_kuisioner')
                 ->join('tb_kuisioner', 'tb_hasil_kuisioner.id_kuis', '=', 'tb_kuisioner.id_kuis')
                 ->where('tb_kuisioner.kode_kuis', '=', 'P'.$i)
                 ->where('tb_hasil_kuisioner.jawaban_harapan', '=', '2')->count();
            array_push($kp, $kp_count);

            $cp_count  = DB::table('tb_hasil_kuisioner')
                 ->join('tb_kuisioner', 'tb_hasil_kuisioner.id_kuis', '=', 'tb_kuisioner.id_kuis')
                 ->where('tb_kuisioner.kode_kuis', '=', 'P'.$i)
                 ->where('tb_hasil_kuisioner.jawaban_harapan', '=', '3')->count();
            array_push($cp, $cp_count);

            $p_count   = DB::table('tb_hasil_kuisioner')
                 ->join('tb_kuisioner', 'tb_hasil_kuisioner.id_kuis', '=', 'tb_kuisioner.id_kuis')
                 ->where('tb_kuisioner.kode_kuis', '=', 'P'.$i)
                 ->where('tb_hasil_kuisioner.jawaban_harapan', '=', '4')->count();
            array_push($p, $p_count);

            $sp_count  = DB::table('tb_hasil_kuisioner')
                 ->join('tb_kuisioner', 'tb_hasil_kuisioner.id_kuis', '=', 'tb_kuisioner.id_kuis')
                 ->where('tb_kuisioner.kode_kuis', '=', 'P'.$i)
                 ->where('tb_hasil_kuisioner.jawaban_harapan', '=', '5')->count();
            array_push($sp, $sp_count);
        }
           
        $jumlah = Kuisioner::count();
        for ($j = 0; $j < $jumlah; $j++) {
            $check = Fuzzyfikasi::where('id_hasil', $request->id_hasil)->first();
            if (!$check) {
                $answers[] = [
                    'id_hasil' => $request->id_hasil[$j],
                    //harapan
                    'batasBawahHarapan' => (((0 * $tp[$j]) + (1 * $kp[$j]) + (2 * $cp[$j]) + (3 * $p[$j]) + (4 * $sp[$j])) / ($tp[$j] + $kp[$j] + $cp[$j] + $p[$j] + $sp[$j])),
                    'batasTengahHarapan' => (((1 * $tp[$j]) + (2 * $kp[$j]) + (3 * $cp[$j]) + (4 * $p[$j]) + (5 * $sp[$j])) / ($tp[$j] + $kp[$j] + $cp[$j] + $p[$j] + $sp[$j])),
                    'batasAtasHarapan' => (((2 * $tp[$j]) + (3 * $kp[$j]) + (4 * $cp[$j]) + (5 * $p[$j]) + (5 * $sp[$j])) / ($tp[$j] + $kp[$j] + $cp[$j] + $p[$j] + $sp[$j])),

                    //persepsi
                    'batasBawahPersepsi' => (((0 * $tpp[$j]) + (1 * $kpp[$j]) + (2 * $cpp[$j]) + (3 * $pp[$j]) + (4 * $spp[$j])) / ($tpp[$j] + $kpp[$j] + $cpp[$j] + $pp[$j] + $spp[$j])),
                    'batasTengahPersepsi' => (((1 * $tpp[$j]) + (2 * $kpp[$j]) + (3 * $cpp[$j]) + (4 * $pp[$j]) + (5 * $spp[$j])) / ($tpp[$j] + $kpp[$j] + $cpp[$j] + $pp[$j] + $spp[$j])),
                    'batasAtasPersepsi' => (((2 * $tpp[$j]) + (3 * $kpp[$j]) + (4 * $cpp[$j]) + (5 * $pp[$j]) + (5 * $spp[$j])) / ($tpp[$j] + $kpp[$j] + $cpp[$j] + $pp[$j] + $spp[$j])),
                ];
            } else {
                return redirect('/fuzzyfikasi/index')->with('alertF', 'Proses Fuzzyfikasi Tidak Dapat Dilakukan Berulang!');
            }
        }
        dd($answers);
        Fuzzyfikasi::insert($answers);
    	return view('hasil/index_fuzy', compact(
            'hasil',
            'tp',
            'kp',
            'cp',
            'p',
            'sp',
            'tpp',
            'kpp',
            'cpp',
            'pp',
            'spp',
            'bbh',
            'bth',
            'bah',
            'bbp',
            'btp',
            'bap',
            'defuzzyh',
            'defuzzyp',
            'tang',
            'tangp',
            'reli',
            'relip',
            'respon',
            'responp',
            'assu',
            'assup',
            'em',
            'emp'
        ));
 
    }
}
