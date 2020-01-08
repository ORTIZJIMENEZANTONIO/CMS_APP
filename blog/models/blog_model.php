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


	static public function mostrar_articulo_mdl($table, $item, $valor){
		$query = "SELECT ta.id, ta.titulo, ta.portada, ta.contenido, ta.description, ta.palabras_clave , DATE_FORMAT(ta.fecha, '%d/%m/%Y') as fecha, tc.titulo as categoria, tc.ruta as ruta_categoria  FROM $table ta, tbl_categorias tc WHERE ta.id_categoria = tc.id AND ta.$item = :$item  ";
		//echo($query);
		$stmt  = conection::conect()->prepare($query); 
		$stmt  -> bindParam(":".$item , $valor, PDO::PARAM_STR);
		$stmt  -> execute(); 
		return $stmt->fetch();
		$stmt -> close();
		$stmt = NULL;
	
	}


	static public function mostrar_opiniones_articulo_mdl($table, $table2, $item, $valor){
		if (is_null($table2)) {
			$query = "SELECT * FROM $table WHERE  $item = :$item  AND aprobacion = '1'";
		}else{
			$query = "SELECT a.respuesta, a.fecha_respuesta, b.nombre_completo as name_admin, b.foto as foto_admin FROM $table a, $table2 b WHERE a.id_administrador = b.id AND a.$item = :$item  AND aprobacion = '1'";
		}
		
		$stmt  = conection::conect()->prepare($query); 
		$stmt  -> bindParam(":".$item , $valor, PDO::PARAM_STR);
		$stmt  -> execute(); 
		return $stmt->fetchAll();
		$stmt -> close();
		$stmt = NULL;
	}

	static public function enviar_opinion_mdl($table, $datos){
		if (isset($datos['foto'])) {
			$query = "INSERT INTO $table (id, id_articulo, nombre, email, foto, contenido, fecha ) VALUES(null, :id, :nombre, :email, :foto, :contenido, :fecha)";
		}else{
			$query = "INSERT INTO $table (id, id_articulo, nombre, email, foto, contenido, fecha ) VALUES(null, :id, :nombre, :email, 'views/img/user01.jpg', :contenido, :fecha)";
		}
		
		$stmt = conection::conect()->prepare($query);
		$stmt -> bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos['email'], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datos['opinion'], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $datos['date'], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos['id'], PDO::PARAM_INT);
		if (isset($datos['foto'])) 
			$stmt -> bindParam(":foto", $datos['foto'], PDO::PARAM_STR) ;

		if ($stmt->execute()) {
			return "ok";
		}else{
			print_r(conection::conect()->errorinfo());
		}

		$stmt -> close();
		$stmt = NULL;
	}


	static public function mostrar_busquedas_mdl($desde, $hasta, $table, $valor){
		$valor = "%".$valor."%";
		$query = "SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') as fecha_articulo FROM $table WHERE titulo LIKE :item OR description LIKE :item OR palabras_clave LIKE :item LIMIT $desde, $hasta";

		//echo '<pre>'; print_r($query); echo '</pre>';
		$stmt  = conection::conect()->prepare($query); 
		$stmt  -> bindParam(":item" , $valor, PDO::PARAM_STR);
		$stmt  -> execute(); 
		return $stmt->fetchAll();
		$stmt -> close();
		$stmt = NULL;
	}

	static public function count_busquedas_mdl($table, $valor){
		$valor = "%".$valor."%";
		$query = "SELECT COUNT(*) as total FROM $table WHERE titulo LIKE :item OR description LIKE :item OR palabras_clave LIKE :item";

		$stmt  = conection::conect()->prepare($query); 
		$stmt  -> bindParam(":item" , $valor, PDO::PARAM_STR);
		$stmt  -> execute(); 
		return $stmt->fetch();
		$stmt -> close();
		$stmt = NULL;	
	}
}

 ?>