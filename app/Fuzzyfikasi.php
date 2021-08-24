<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuzzyfikasi extends Model
{
    protected $table = 'tb_fuzzyfikasi';
    protected $primaryKey = 'id_fuzzy';
    protected $fillable = [
        'id_hasil', 
        'batasBawahHarapan',
        'batasTengahHarapan',
        'batasAtasHarapan',
        'batasBawahPersepsi',
        'batasTengahPersepsi',
        'batasAtasPersepsi'
    ];
    function hasilkuisioner(){
        return $this->belongsTo(HasilKuisioner::class, 'id_hasil', 'id_hasil');
    }
    

}