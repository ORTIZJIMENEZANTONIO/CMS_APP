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
		$desd = ($desde-1) * 5;
		$hasta = $desd + 5;
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
			//echo '<pre class="bg-light">'; var_dump($response); echo '</pre>';
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
	
}


 ?>