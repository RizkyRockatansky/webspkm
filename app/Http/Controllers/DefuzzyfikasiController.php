<?php

namespace App\Http\Controllers;
use App\Defuzzyfikasi; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefuzzyfikasiController extends Controller
{
    public function index()
    {
    	
    	$defuzzyfikasi = Defuzzyfikasi::all();
        
 
    	return view('/defuzzyfikasi/index',['defuzzyfikasi' => $defuzzyfikasi]);
 
    }
}