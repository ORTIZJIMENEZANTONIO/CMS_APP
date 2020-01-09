<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;

class Anuncio_ctr extends Controller
{
    public function Index(){
    	$anuncios = Anuncio::all();
    	return view('pages.anuncios', array('anuncios' => $anuncios));
    }
}
