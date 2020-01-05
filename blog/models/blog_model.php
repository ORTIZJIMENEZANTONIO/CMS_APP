<?php 

require_once 'conexion.php';
/**
 * 
 */
class blog_model{
	
	static public function mostrar_blog_mdl($table1){
		$stmt = conection::conect()->prepare("SELECT * FROM $table1");
		$stmt -> execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt = null;
	}

	static public function mostrar_categorias_mdl($table){
		$stmt = conection::conect()->prepare("SELECT * FROM $table");
		$stmt -> execute();
		return $stmt->fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	
	static public function mostrar_articulos_mdl($table1, $table2, $desde, $hasta, $item, $valor){
		/*
		$table1	= "tbl_articulos";
		$table2	= "tbl_categorias";
		*/

		if (is_null($item) and is_null($valor)) {
			$query = "SELECT $table1.*, $table2.titulo as titulo_categoria, DATE_FORMAT($table1.fecha, '%d/%m/%Y') AS fecha_articulo FROM $table1 INNER JOIN $table2 ON $table1.id_categoria = $table2.id ORDER BY $table1.id DESC  LIMIT $desde, $hasta";
			
			$stmt = conection::conect()->prepare($query);

		}else if(is_null($desde) and is_null($hasta) and !is_null($item) and !is_null($valor)){
			$stmt = conection::conect()->prepare("SELECT $table1.*, $table2.titulo as titulo_categoria, DATE_FORMAT($table1.fecha, '%d/%m/%Y') AS fecha_articulo FROM $table1 INNER JOIN $table2 ON $table1.id_categoria = $table2.id WHERE $table2.$item = :$item ORDER BY $table1.id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);	

		}else if(!is_null($desde) and !is_null($hasta) and !is_null($item) and !is_null($valor)){
			$stmt = conection::conect()->prepare("SELECT $table1.*, $table2.titulo as titulo_categoria, DATE_FORMAT($table1.fecha, '%d/%m/%Y') AS fecha_articulo FROM $table1 INNER JOIN $table2 ON $table1.id_categoria = $table2.id WHERE $table2.$item = :$item ORDER BY $table1.id DESC LIMIT $desde, $hasta");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);		
		}

		if ($stmt->execute()) {
			return $stmt->fetchAll();
		}else{
			print_r(conection::conect()->errorinfo());
		}
		
		$stmt -> close();
		$stmt = null;
	}

	static public function mostrar_etiquetas_mdl($table, $item, $valor){

		$stmt = conection::conect()->prepare("SELECT palabras_clave FROM $table WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt->fetch();
		$stmt -> close();
		$stmt = null;
	}

	static public function count_total_mdl($table, $item, $valor){

		if (is_null($item) && is_null($valor)) {
			$stmt = conection::conect()->prepare("SELECT count(*) as total FROM $table");
		} else {
			$stmt = conection::conect()->prepare("SELECT count(*) as total FROM $table WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		}

		$stmt -> execute();
		return $stmt->fetch();
		$stmt -> close();
		$stmt = null;
	}


	static public function mostrar_articulos_destacados_mdl(){
		$query = "SELECT id, titulo, ruta, portada, description FROM `tbl_articulos` Order by visitas desc limit 0,3";
		$stmt = conection::conect()->prepare($query);
		$stmt -> execute();
		return $stmt->fetchAll();
		$stmt -> close();
		$stmt = null;
	}

}

 ?>