<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;

class Articulo_ctr extends Controller
{
   public function Index(){
	     $articulos = Articulo::all();
	     return view('pages.articulos', array('articulos' => $articulos));
	 }
}
