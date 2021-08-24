<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilKuisioner extends Model
{
    protected $table = "tb_hasil_kuisioner";

    protected $fillable = [
        'id_hasil', 'id_mhs', 'id_periode', 'id_kuis', 'jawaban_persepsi', 'jawaban_harapan'
    ];

    function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'id_mhs', 'id_mhs');
    }

    
    function periode(){
        return $this->belongsTo(periode::class, 'id_periode', 'id_periode');
    }

    function kuisioner(){
        return $this->belongsTo(kuisioner::class, 'id_kuis', 'id_kuis');
    }
}

