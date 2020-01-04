<?php 
require_once 'models/blog_model.php';
/**
 * 
 */
class blog_controller{

	static public function mostrar_blog_ctr(){
		$table = "tbl_blog";
		$response = blog_model::mostrar_blog_mdl($table);
		return $response;
	}

	static public function mostrar_categorias_ctr(){
		$table = "tbl_categorias";
		$response = blog_model::mostrar_categorias_mdl($table);
		return $response;
	}

	static public function mostrar_articulos_ctr($desde, $item, $valor){
		$table1	= "tbl_articulos";
		$table2	= "tbl_categorias";
		$desde = ($desde-1) * 5;
		$hasta = $desde + 5;
		$response = blog_model::mostrar_articulos_mdl($table1, $table2, $desde, $hasta, $item, $valor);
		return $response;
	}

	static public function count_total_ctr(){
		$table	= "tbl_articulos";
		$response = blog_model::count_total_mdl($table);
		return $response;
	}
	
}


 ?>