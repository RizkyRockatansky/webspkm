<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Admin extends Model
{
    protected $table = 'tb_admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'nama_admin','email'
    ];
}