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
	
}


 ?>