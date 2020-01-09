<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opinion;

class Opinion_ctr extends Controller
{
    public function Index(){
    	$opiniones = Opinion::all();
    	return view('pages.opiniones', array('opiniones' => $opiniones));
    }
}
