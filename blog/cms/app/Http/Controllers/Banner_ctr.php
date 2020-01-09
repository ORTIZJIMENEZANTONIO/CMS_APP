<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class Banner_ctr extends Controller
{
    public function Index(){
    	$banners = Banner::all();
    	return view('pages.banners', array('banners' => $banners));
    }
}
