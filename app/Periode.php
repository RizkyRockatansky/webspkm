<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Periode extends Model
{
    protected $table = 'tb_periode';
    protected $primaryKey = 'id_periode';
    protected $fillable = [
        'nama_periode','tanggal'
    ];
}