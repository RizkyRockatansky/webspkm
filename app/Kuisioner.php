<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Kuisioner extends Model
{
    protected $table = 'tb_kuisioner';
    protected $primaryKey = 'id_kuis';
    protected $fillable = [
        'pertanyaan','id_kategori', 'pilihan'
    ];
}