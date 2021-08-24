<?php
 
namespace App\Http\Controllers;
use App\Kuisioner; 
use App\HasilKuisioner; 
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
 
 
class KuisionerController extends Controller
{
   private $isSucess;
   private $exception;

   public function __construct() {
       $this->isSucess=true;
    $this->exception="";
   }


   public function kuisioner(Request $request)
   {
       $result=new Kuisioner();
       if($request->id_kuis) $result=$result->where('id_kuis',$request->id_kuis);
       $result=$result->orderBy("updated_at",'desc')->get();
        $isAvalible=count($result) > 0 ? true: false;
       return  response()->json([
        "status" => $isAvalible ?? false,
        "code" => $isAvalible ? 200 : 600,
        "message" => $isAvalible ?  "Get Data Success!":"Data Not Found" ,
        "data" =>  $isAvalible ? $result : []
       ]); 
   }


   public function storeHasil(Request $request)
   {
        $validator=Validator::make($request->all(),[
                'data' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'erorr' => $validator->errors()->getMessages()
            ]);
        }

        DB::beginTransaction();
        try{

                foreach ($request->data as $key => $item) {
                    // dd($item);
                    HasilKuisioner::create([
                        "id_mhs" => $item['id_mhs'],
                        "id_periode" => $item['id_periode'],
                        "id_kuis" => $item['id_kuis'],
                        "jawaban_persepsi" => $item['jawaban_persepsi'],
                        "jawaban_harapan" => $item['jawaban_harapan'],
                    ]);
                }


            DB::commit();

        }catch(\Exception $error){
            DB::rollBack();
            $this->isSucess=false;
            $this->exception=$error;
        }

        return response()->json([
                "status" => $this->isSucess ?? false,
                "code" => $this->isSucess ? 200: 600,
                "message" => $this->isSucess ? "Data Success Save"  : "Data Not Saved!",
                "data" => $request->data
        ]);

   }

    public function index()
    {
        // $pertanyaan = DB::table('pertanyaan')->join("kategori", "pertanyaan.id_kategori", "=", "kategori.id_kategori")->get();
    	// $kuisioner = DB::table('tb_kuisioner')->join("tb_kategori","tb_kuisioner.id_kategori", "=", "tb_kategori.id_kategori")->get();
        $kuisioner = Kuisioner::all();
        $kategori = Kategori::all();
        return view('/kuisioner/index', compact('kuisioner','kategori'));
    	// return view('/kuisioner/index',['kuisioner' => $kuisioner]);
 
    }

    public function create()
    {
    	return view('kuisioner/index');
 
    }

    public function store(Request $request)
    {
    	 DB::table('tb_kuisioner')->insert([
            'pertanyaan' => $request->pertanyaan,
            'id_kategori' => $request->id_kategori,
            'kode_kuis' => $request->kode_kuis,
            'pilihanA' => $request->pilihanA,
            'pilihanB' => $request->pilihanB,
            'pilihanC' => $request->pilihanC,
            'pilihanD' => $request->pilihanD,
            'pilihanE' => $request->pilihanE
        ]);

        
        return redirect('/kuisioner/index')->with('message', 'Tambah Kuisioner telah Behasil!'); 
    }

    public function edit($id)
    {
    	$kuisioner = DB::table('tb_kuisioner')->where('id_kuis',$id)->get;

        return view('edit',['tb_kuisioner' => $kuisioner]); 
    }

    public function update(Request $request)
    {
    	DB::table('tb_kuisioner')->where('id_kuis',$request->id)->update([
            'pertanyaan' => $request->pertanyaan,
            'id_kategori' => $request->id_kategori,
            'kode_kuis' => $request->kode_kuis,
            'pilihanA' => $request->pilihanA,
            'pilihanB' => $request->pilihanB,
            'pilihanC' => $request->pilihanC,
            'pilihanD' => $request->pilihanD,
            'pilihanE' => $request->pilihanE
        ]);
        // dd($b);
        return redirect('/kuisioner/index')->with('message', 'Edit Kuisioner telah Behasil!'); 
    }

    public function delete($id)
    {
    	$kuisioner = Kuisioner::find($id);
        $kuisioner->delete();
        return redirect('/kuisioner/index')->with('message', 'Hapus Kuisioner telah Behasil!'); 
    }

}