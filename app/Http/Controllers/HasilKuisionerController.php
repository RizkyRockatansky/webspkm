<?php

namespace App\Http\Controllers;
use App\HasilKuisioner; 
use App\Kuisioner; 
use App\Kategori;
use App\Fuzzyfikasi; 
use App\Defuzzyfikasi; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilKuisionerController extends Controller
{
    public function index()
    {
    	
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
           

//    ===================================================FUZYFIKASI===============================================================     

        //fuzzyfikasi
        for ($i = 0; $i < $jumlah; $i++) {
            // dd($sp[$i]);
           

            //batas bawah persepsi
            $fuzzy44 = (((0 * $tpp[$i]) + (1 * $kpp[$i]) + (2 * $cpp[$i]) + (3 * $pp[$i]) + (4 * $spp[$i]))  / ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($bbp,  $fuzzy44);

            //batas tengah persepsi
            $fuzzy55 = (((1 * $tpp[$i]) + (2 * $kpp[$i]) + (3 * $cpp[$i]) + (4 * $pp[$i]) + (5 * $spp[$i]))  / ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($btp,  $fuzzy55);

            //batas atas persepsi
            $fuzzy66 = (((2 * $tpp[$i]) + (3 * $kpp[$i]) + (4 * $cpp[$i]) + (5 * $pp[$i]) + (5 * $spp[$i]))  /  ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($bap,  $fuzzy66);

             //batas bawah harapan
             $fuzzy11 =  (((0 * $tp[$i]) + (1 * $kp[$i]) + (2 * $cp[$i]) + (3 * $p[$i]) + (4 * $sp[$i]))  / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
             array_push($bbh, $fuzzy11);
 
             //batas tengah harapan
             $fuzzy22 = (((1 * $tp[$i]) + (2 * $kp[$i]) + (3 * $cp[$i]) + (4 * $p[$i])+ (5 * $sp[$i])) / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
             array_push($bth,  $fuzzy22);
 
             //batas atas harapan
             $fuzzy33 = (((2 * $tp[$i]) + (3 * $kp[$i]) + (4 * $cp[$i]) + (5 * $p[$i]) + (5 * $sp[$i])) / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
             array_push($bah,  $fuzzy33);
        }

 //    ===================================================DEFUZYFIKASI===============================================================     


        //defuzzyfikasi
        for ($i = 0; $i < $jumlah; $i++) {
            //harapan
            $defuzzyhh = (($bbh[$i] + $bth[$i] + $bah[$i]) / 3);
            array_push($defuzzyh,  $defuzzyhh);

            //persepsi
            $defuzzypp = (($bbp[$i] + $btp[$i] + $bap[$i]) / 3);
            array_push($defuzzyp,  $defuzzypp);
        }
//    ===================================================Kategori===============================================================     

        //tangibles
        $tang = (($defuzzyh[0] + $defuzzyh[1] + $defuzzyh[2]) / 3);
        $tangp =  (($defuzzyp[0] + $defuzzyp[1] + $defuzzyp[2]) / 3);

        //reliability
        $reli = (($defuzzyh[3] + $defuzzyh[4] + $defuzzyh[5] + $defuzzyh[6]) / 4);
        $relip =  (($defuzzyp[3] + $defuzzyp[4] + $defuzzyp[5] + $defuzzyp[6]) / 4);

        //responsiveness
        $respon = (($defuzzyh[7] + $defuzzyh[8]) / 2);
        $responp =  (($defuzzyp[7] + $defuzzyp[8]) / 2);

        //assurance
        $assu = (($defuzzyh[9] + $defuzzyh[10] + $defuzzyh[11]) / 3);
        $assup =  (($defuzzyp[9] + $defuzzyp[10] + $defuzzyp[11]) / 3);

        //emphaty
        $em = (($defuzzyh[12] + $defuzzyh[13] + $defuzzyh[14] + $defuzzyh[15]) / 4);
        $emp =  (($defuzzyp[12] + $defuzzyp[13] + $defuzzyp[14] + $defuzzyp[15]) / 4);

//    ================================================== =Menampung data untuk ke view ===============================================================     

        $hasil = Kuisioner::all();

        foreach ($hasil as $key => $item) {
            $before_result = (object)[
                'tp' => $tp[$key],
                'kp' => $kp[$key],
                'cp' => $cp[$key],
                'p' => $p[$key],
                'sp' => $sp[$key],
                'tpp' => $tpp[$key],
                'kpp' => $kpp[$key],
                'cpp' => $cpp[$key],
                'pp' => $pp[$key],
                'spp' => $spp[$key],
            ];
            $after_result = (object)[
                'bbh' => $bbh[$key],
                'bth' => $bth[$key],
                'bah' => $bah[$key],
                'bbp' => $bbp[$key],
                'btp' => $btp[$key],
                'bap' => $bap[$key],
            ];
            $after_result2 = (object)[
                'defuzzyh' => $defuzzyh[$key],
                'defuzzyp' => $defuzzyp[$key],
            ];
            $item->before_result = $before_result; ///HASIL KUESIONER
            $item->after_result = $after_result; //FUZIFIKASY
            $item->after_result2 = $after_result2; //DEFUZUUDS
        }
        $hasilkuisioner = HasilKuisioner::all();
        
        //    ===================================================INSERT FUZYFIKASI===============================================================     

        $jumlah = Kuisioner::count();
        for ($j = 0; $j < $jumlah; $j++) {
            $check = Fuzzyfikasi::where('id_hasil', $hasilkuisioner[$j]->id_hasil)->first();
            if (!$check) {
                $answers[] = [
                    'id_hasil' => $hasilkuisioner[$j]->id_hasil,
                    
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
                return view('hasil/index', compact(
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
                // return redirect('/fuzzyfikasi/index')->with('alertF', 'Proses Fuzzyfikasi Tidak Dapat Dilakukan Berulang!');
            }
        }
        // dd($answers);
        Fuzzyfikasi::insert($answers);
        


// Fuzifikasi::insert(["id_hasil"=>?, bbg=>?, bth=>?])
        return view('hasil/index', compact(
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
        // dd($fuzzy6);
    }

    public function index_fuzy()
    {
    	
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
           

        

        //fuzzyfikasi
        for ($i = 0; $i < $jumlah; $i++) {
            // dd($sp[$i]);
           

            //batas bawah persepsi
            $fuzzy44 = (((0 * $tpp[$i]) + (1 * $kpp[$i]) + (2 * $cpp[$i]) + (3 * $pp[$i]) + (4 * $spp[$i]))  / ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($bbp,  $fuzzy44);

            //batas tengah persepsi
            $fuzzy55 = (((1 * $tpp[$i]) + (2 * $kpp[$i]) + (3 * $cpp[$i]) + (4 * $pp[$i]) + (5 * $spp[$i]))  / ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($btp,  $fuzzy55);

            //batas atas persepsi
            $fuzzy66 = (((2 * $tpp[$i]) + (3 * $kpp[$i]) + (4 * $cpp[$i]) + (5 * $pp[$i]) + (5 * $spp[$i]))  /  ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($bap,  $fuzzy66);

             //batas bawah harapan
             $fuzzy11 =  (((0 * $tp[$i]) + (1 * $kp[$i]) + (2 * $cp[$i]) + (3 * $p[$i]) + (4 * $sp[$i]))  / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
             array_push($bbh, $fuzzy11);
 
             //batas tengah harapan
             $fuzzy22 = (((1 * $tp[$i]) + (2 * $kp[$i]) + (3 * $cp[$i]) + (4 * $p[$i])+ (5 * $sp[$i])) / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
             array_push($bth,  $fuzzy22);
 
             //batas atas harapan
             $fuzzy33 = (((2 * $tp[$i]) + (3 * $kp[$i]) + (4 * $cp[$i]) + (5 * $p[$i]) + (5 * $sp[$i])) / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
             array_push($bah,  $fuzzy33);
        }

        // dd($bbp);

        //defuzzyfikasi
        for ($i = 0; $i < $jumlah; $i++) {
            //harapan
            $defuzzyhh = (($bbh[$i] + $bth[$i] + $bah[$i]) / 3);
            array_push($defuzzyh,  $defuzzyhh);

            //persepsi
            $defuzzypp = (($bbp[$i] + $btp[$i] + $bap[$i]) / 3);
            array_push($defuzzyp,  $defuzzypp);
        }

        //tangibles
        $tang = (($defuzzyh[0] + $defuzzyh[1] + $defuzzyh[2]) / 3);
        $tangp =  (($defuzzyp[0] + $defuzzyp[1] + $defuzzyp[2]) / 3);

        //reliability
        $reli = (($defuzzyh[3] + $defuzzyh[4] + $defuzzyh[5] + $defuzzyh[6]) / 4);
        $relip =  (($defuzzyp[3] + $defuzzyp[4] + $defuzzyp[5] + $defuzzyp[6]) / 4);

        //responsiveness
        $respon = (($defuzzyh[7] + $defuzzyh[8]) / 2);
        $responp =  (($defuzzyp[7] + $defuzzyp[8]) / 2);

        //assurance
        $assu = (($defuzzyh[9] + $defuzzyh[10] + $defuzzyh[11]) / 3);
        $assup =  (($defuzzyp[9] + $defuzzyp[10] + $defuzzyp[11]) / 3);

        //emphaty
        $em = (($defuzzyh[12] + $defuzzyh[13] + $defuzzyh[14] + $defuzzyh[15]) / 4);
        $emp =  (($defuzzyp[12] + $defuzzyp[13] + $defuzzyp[14] + $defuzzyp[15]) / 4);

        $hasil = Kuisioner::all();

        foreach ($hasil as $key => $item) {
            $before_result = (object)[
                'tp' => $tp[$key],
                'kp' => $kp[$key],
                'cp' => $cp[$key],
                'p' => $p[$key],
                'sp' => $sp[$key],
                'tpp' => $tpp[$key],
                'kpp' => $kpp[$key],
                'cpp' => $cpp[$key],
                'pp' => $pp[$key],
                'spp' => $spp[$key],
            ];
            $after_result = (object)[
                'bbh' => $bbh[$key],
                'bth' => $bth[$key],
                'bah' => $bah[$key],
                'bbp' => $bbp[$key],
                'btp' => $btp[$key],
                'bap' => $bap[$key],
            ];
            $after_result2 = (object)[
                'defuzzyh' => $defuzzyh[$key],
                'defuzzyp' => $defuzzyp[$key],
            ];
            $item->before_result = $before_result;
            $item->after_result = $after_result;
            $item->after_result2 = $after_result2;
        }

        ///insert defuzzyfikasi
        //    ===================================================INSERT DEFUZYFIKASI===============================================================     


        $fuzzyfikasi = Fuzzyfikasi::all() ;
        //harapan
        // dd($fuzzyfikasis);
        
        $jumlah = Kuisioner::count();
        for ($k = 0; $k < $jumlah; $k++) {
            $check = Defuzzyfikasi::where('id_fuzzy', $fuzzyfikasi[$k]->id_fuzzy)->first();
            if (!$check) {
                $answers1[] = [
                    'id_fuzzy' => $fuzzyfikasi[$k]->id_fuzzy,
                    
                    //harapan
                    'harapan' => (($bbh[$k] + $bth[$k] + $bah[$k]) / 3),
        
                    //persepsi
                    'persepsi' => (($bbp[$k] + $btp[$k] + $bap[$k]) / 3),

                    //gap
                    'gap' =>  (($bbp[$k] + $btp[$k] + $bap[$k]) / 3) - (($bbh[$k] + $bth[$k] + $bah[$k]) / 3)

                ];
            } else {
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
                // return redirect('/fuzzyfikasi/index')->with('alertF', 'Proses Fuzzyfikasi Tidak Dapat Dilakukan Berulang!');
            }
        }
        // dd($answers1);
        Defuzzyfikasi::insert($answers1);

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
        // dd($fuzzy6);
    }
    
    public function index_defuzy()
    {
    	
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
           

        

        //fuzzyfikasi
        for ($i = 0; $i < $jumlah; $i++) {
            // dd($sp[$i]);
           

            //batas bawah persepsi
            $fuzzy44 = (((0 * $tpp[$i]) + (1 * $kpp[$i]) + (2 * $cpp[$i]) + (3 * $pp[$i]) + (4 * $spp[$i]))  / ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($bbp,  $fuzzy44);

            //batas tengah persepsi
            $fuzzy55 = (((1 * $tpp[$i]) + (2 * $kpp[$i]) + (3 * $cpp[$i]) + (4 * $pp[$i]) + (5 * $spp[$i]))  / ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($btp,  $fuzzy55);

            //batas atas persepsi
            $fuzzy66 = (((2 * $tpp[$i]) + (3 * $kpp[$i]) + (4 * $cpp[$i]) + (5 * $pp[$i]) + (5 * $spp[$i]))  /  ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($bap,  $fuzzy66);

             //batas bawah harapan
             $fuzzy11 =  (((0 * $tp[$i]) + (1 * $kp[$i]) + (2 * $cp[$i]) + (3 * $p[$i]) + (4 * $sp[$i]))  / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
             array_push($bbh, $fuzzy11);
 
             //batas tengah harapan
             $fuzzy22 = (((1 * $tp[$i]) + (2 * $kp[$i]) + (3 * $cp[$i]) + (4 * $p[$i])+ (5 * $sp[$i])) / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
             array_push($bth,  $fuzzy22);
 
             //batas atas harapan
             $fuzzy33 = (((2 * $tp[$i]) + (3 * $kp[$i]) + (4 * $cp[$i]) + (5 * $p[$i]) + (5 * $sp[$i])) / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
             array_push($bah,  $fuzzy33);
        }

        // dd($bbp);

        //defuzzyfikasi
        for ($i = 0; $i < $jumlah; $i++) {
            //harapan
            $defuzzyhh = (($bbh[$i] + $bth[$i] + $bah[$i]) / 3);
            array_push($defuzzyh,  $defuzzyhh);

            //persepsi
            $defuzzypp = (($bbp[$i] + $btp[$i] + $bap[$i]) / 3);
            array_push($defuzzyp,  $defuzzypp);
        }

        //tangibles
        $tang = (($defuzzyh[0] + $defuzzyh[1] + $defuzzyh[2]) / 3);
        $tangp =  (($defuzzyp[0] + $defuzzyp[1] + $defuzzyp[2]) / 3);

        //reliability
        $reli = (($defuzzyh[3] + $defuzzyh[4] + $defuzzyh[5] + $defuzzyh[6]) / 4);
        $relip =  (($defuzzyp[3] + $defuzzyp[4] + $defuzzyp[5] + $defuzzyp[6]) / 4);

        //responsiveness
        $respon = (($defuzzyh[7] + $defuzzyh[8]) / 2);
        $responp =  (($defuzzyp[7] + $defuzzyp[8]) / 2);

        //assurance
        $assu = (($defuzzyh[9] + $defuzzyh[10] + $defuzzyh[11]) / 3);
        $assup =  (($defuzzyp[9] + $defuzzyp[10] + $defuzzyp[11]) / 3);

        //emphaty
        $em = (($defuzzyh[12] + $defuzzyh[13] + $defuzzyh[14] + $defuzzyh[15]) / 4);
        $emp =  (($defuzzyp[12] + $defuzzyp[13] + $defuzzyp[14] + $defuzzyp[15]) / 4);

        $hasil = Kuisioner::all();

        foreach ($hasil as $key => $item) {
            $before_result = (object)[
                'tp' => $tp[$key],
                'kp' => $kp[$key],
                'cp' => $cp[$key],
                'p' => $p[$key],
                'sp' => $sp[$key],
                'tpp' => $tpp[$key],
                'kpp' => $kpp[$key],
                'cpp' => $cpp[$key],
                'pp' => $pp[$key],
                'spp' => $spp[$key],
            ];
            $after_result = (object)[
                'bbh' => $bbh[$key],
                'bth' => $bth[$key],
                'bah' => $bah[$key],
                'bbp' => $bbp[$key],
                'btp' => $btp[$key],
                'bap' => $bap[$key],
            ];
            $after_result2 = (object)[
                'defuzzyh' => $defuzzyh[$key],
                'defuzzyp' => $defuzzyp[$key],
            ];
            $item->before_result = $before_result;
            $item->after_result = $after_result;
            $item->after_result2 = $after_result2;
        }

        return view('hasil/index_defuzy', compact(
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
        // dd($fuzzy6);
    }

}
