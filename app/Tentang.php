<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = 'tb_tentang';
    protected $primaryKey = 'id_tentang';
    protected $fillable = [
        'deskripsi'
    ];
}
