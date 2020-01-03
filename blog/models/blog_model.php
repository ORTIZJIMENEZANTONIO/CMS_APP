<?php 

require_once 'conexion.php';
/**
 * 
 */
class blog_model
{
	
	static public function mostrar_blog_mdl($table){
		$stmt = conection::conect()->prepare("SELECT * FROM $table");
		$stmt -> execute();
		return $stmt->fetch();
		$stmt -> close();
		$stmt = null;
	}
}

 ?>