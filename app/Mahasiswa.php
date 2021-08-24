<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Mahasiswa extends Model
{
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'id_mhs';
    protected $fillable = [
        'nama_mhs', 'nim', 'email'
    ];
}