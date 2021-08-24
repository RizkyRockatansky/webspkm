<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defuzzyfikasi extends Model
{
    protected $table = 'tb_defuzzyfikasi';
    protected $primaryKey = 'id_defuzzy';
    protected $fillable = [
        'id_defuzzy', 'id_fuzzy', 'harapan', 'persepsi', 'gap'
    ];
    function fuzzyfikasi(){
        return $this->belongsTo(Fuzzyfikasi::class, 'id_fuzzy', 'id_fuzzy');
    }
}
