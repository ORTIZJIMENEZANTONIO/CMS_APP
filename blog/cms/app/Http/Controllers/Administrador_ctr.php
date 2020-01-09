<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrador;

class Administrador_ctr extends Controller
{
    public function Index(){
    	$admins = Administrador::all();
    	return view('pages.administradores', array('admins' => $admins));
    }
}
