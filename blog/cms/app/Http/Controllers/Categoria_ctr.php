<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class Categoria_ctr extends Controller
{
    public function Index(){
    	$categorias = Categoria::all();
    	return view('pages.categorias', array('cateorias' => $categorias));
    }


}
