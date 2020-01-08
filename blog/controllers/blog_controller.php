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
		if (!is_null($desde)) {
			$desd = ($desde-1) * 5;
			$hasta = $desd + 5;
		}else{
			$desd = null;
			$hasta = null;
		}

		
		$response = blog_model::mostrar_articulos_mdl($table1, $table2, $desd, $hasta, $item, $valor);
		return $response;
	}

	static public function count_total_ctr($item, $valor){
		if (is_null($item) and is_null($valor)) {
			$table	= "tbl_articulos";
			$response = blog_model::count_total_mdl($table, $item, $valor);
			return $response;
		}else{
			$table1	= "tbl_articulos";
			$table2	= "tbl_categorias";
			$response = count( blog_model::mostrar_articulos_mdl($table1, $table2, null, null, $item, $valor));
			return $response;
		}	
	}

	static public function mostrar_etiquetas_ctr($t, $item){
		switch ($t) {
			case 1:
				$table = "tbl_articulos";
				$response = blog_model::mostrar_etiquetas_mdl($table, "ruta", $item);
				break;

			case 2:
				$table = "tbl_categorias";
				$response = blog_model::mostrar_etiquetas_mdl($table, "ruta", $item);
				break;
			
			default:
				$table = "tbl_categorias";
				break;
		}

		//echo '<pre>'; print_r($response['total']); echo '</pre>';
		return $response;
	}

	static public function mostrar_articulos_destacados_ctr(){
		$response = blog_model:: mostrar_articulos_destacados_mdl();
		return $response;
	}

	static public function mostrar_articulo_ctr($item, $valor){
		$table = "tbl_articulos";
		$response = blog_model::mostrar_articulo_mdl($table, $item, $valor);
		return $response;
	}

	static public function mostrar_opiniones_articulo_ctr($valor, $respondido){
		$table = "tbl_opinion";
		if ($respondido == 1) {
			$table2 = "tbl_administrador";
		}else{
			$table2 = NULL;
		}
		
		$item = "id_articulo";
		$response = blog_model::mostrar_opiniones_articulo_mdl($table, $table2, $item, $valor);
		//$response[0]['id'] = md5($response[0]['id']);
		return $response;
	}

	static public function enviar_opinion_ctr($id){
		$table = "tbl_opinion";
		if (isset($_POST['contenido_opinion']) && isset($_POST['email_opinion']) && isset( $_POST['nombre_opinion']) ) {

			if(isset($_FILES['foto_opinion']['tmp_name']) && !empty($_FILES['foto_opinion']['tmp_name'])){
				list($ancho, $alto) = getimagesize($_FILES['foto_opinion']['tmp_name']);
				
				$newAncho = 130;
				$newLargo = 130;

				$directorio = "views/img/opinions/";
				
				if ($_FILES['foto_opinion']['type'] == "image/png") {
					$aleatorio = mt_rand(10,10000).$id.mt_rand(10,10000);
					$ruta_final = $directorio.$aleatorio.".png";
					$origen = imagecreatefrompng($_FILES['foto_opinion']['tmp_name']);
					$destino = imagecreatetruecolor($newAncho, $newLargo);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $newAncho, $newLargo, $ancho, $alto);
					imagepng($destino, $ruta_final);
					$foto_opinion = $ruta_final;
				}else if($_FILES['foto_opinion']['type'] == "image/jpeg"){
					$aleatorio = mt_rand(10,10000).$id.mt_rand(10,10000);
					$ruta_final = $directorio.$aleatorio.".jpeg";
					$origen = imagecreatefromjpeg($_FILES['foto_opinion']['tmp_name']);
					$destino = imagecreatetruecolor($newAncho, $newLargo);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $newAncho, $newLargo, $ancho, $alto);
					imagejpeg($destino, $ruta_final);
					$foto_opinion = $ruta_final;
				}else{
					return "message-error-formato";
				}

			}else{
				$foto_opinion = "views/img/opinions/anonimo.png";
			}
			

			if( preg_match('/[-a-zA-Z0-9.!¡]+/', $_POST['contenido_opinion']) &&  preg_match('/[a-zA-Z0-9]+/', $_POST['nombre_opinion']) &&  preg_match('/[a-zA-Z0-9.!¡]+[@][a-zA-Z0-9.!¡]+[.][a-zA-Z]+[.]*[a-zA-Z]*/', $_POST['email_opinion'])) {
				$valor =  array('nombre' => $_POST['nombre_opinion'] , 'email' => $_POST['email_opinion'], 'opinion' => $_POST['contenido_opinion'], 'id' => $id, 'date' => date('Y', time())."-".date('m', time())."-".date('d', time()), 'foto' => $foto_opinion);
				//echo '<pre class="bg-light">'; print_r($valor); echo '</pre>';
				$response = blog_model::enviar_opinion_mdl($table, $valor);
		
				return $response;
			}else{
				return "incompleted";
			}
		}else{
			return "vacio";
		}
	
	}


	static public function mostrar_busquedas_ctr($page, $valor){
		$table = "tbl_articulos";
		$desde = $page-1;
		$hasta = $page*5;
		$response = blog_model::mostrar_busquedas_mdl($desde, $hasta, $table, $valor);
		return $response;
	}

	static public function count_busquedas_ctr($valor){
		$table	= "tbl_articulos";
		$response = blog_model::count_busquedas_mdl($table, $valor);
		return $response;
		
	}


}


 ?>