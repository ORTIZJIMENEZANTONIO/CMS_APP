<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{

	protected $table = "tbl_articulos";
	/*==================================
	=            Inner Join            =
	==================================*/
	public function ver_categoria(){

		return $this->belongsTo('App\Categoria', 'id_categoria', 'id');
	}
	
	
	/*=====  End of Inner Join  ======*/
	
	
}
