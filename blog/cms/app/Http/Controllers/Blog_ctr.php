<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class Blog_ctr extends Controller
{
    public function Index(){
    	$blog =  Blog::all();
    	return view("pages.blog", array('blog'=>$blog));
    }
}
