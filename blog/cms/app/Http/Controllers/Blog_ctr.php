<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use App\Blog;

class Blog_ctr extends Controller
{
	/*====================================================
	=            Mostrar Todos los registros             =
	====================================================*/
	public function Index(){
    	$blog =  Blog::all();
    	return view("pages.blog", array('blog'=>$blog));
    }
	/*=====  End of Mostrar Todos los registros   ======*/
	
	/*============================================
	=            Actualizar registgro            =
	============================================*/
	public function update($id, Request $request){
		// primero recoger datos
		$datos = array('dominio' => $request->input('dominio'), 
					    'servidor' => $request->input('server'), 
						'titulo' => $request->input('titulo_blog'), 
						'descripcion' => $request->input('description_blog'),
						'palabras_clave' => $request->input('palabras_clave'), 
						'redes_sociales' => $request->input('redes_sociales'),
						'logo_actual' => $request->input('logo_actual'),
						'portada_actual' => $request->input('portada_actual'),
						'icono_actual' => $request->input('icono_actual')
		);

		$logo	 = array('logo_tmp' => $request->file('logo'));
		$portada = array('portada_tmp' => $request->file('portada'));
		$icono	 = array('icono_tmp' => $request->file('icono'));
		//echo '<pre>'; print_r(var_dump($request->file('portada'))); echo '</pre>';
		//return;
		

		//validar datos
		if (!empty($datos)) {
			$validar = validator::make($datos,[
				'dominio' => 'required|regex:/^[-\\_\\:\\.\\0-9A-Za-z]+$/i',
				'servidor' => 'required|regex:/^[-\\_\\:\\.\\0-9A-Za-z]+$/i',
				'titulo' => 'required|regex:/^[-0-9A-Za-zÑñáéíóú ]+$/i',
				'descripcion' => 'required|regex:/[-\\_\\:\\.\\=\\$\\&\\*\\:\\;\\"\\,\\¡\\?\\¿\\!\\0-9A-Za-zÑñáéíóú ]+$/', 
				'palabras_clave' => 'required|regex:/^[\\,\\\0-9A-Za-zÑñáéíóú ]+$/i',
				'redes_sociales' => 'required',
				'logo_actual' => 'required', 
				'portada_actual' => 'required',
				'icono_actual' => 'required'
			]);

			//Validar logo
			if($logo["logo_tmp"] != ""){
				$validar_logo = validator::make($logo,[
					"logo_tmp" =>'required|image|mimes:jpeg, jpg, png|max:3000000'
				]);

				if($validar_logo -> fails())
					return redirect("/")->with("no-validation-logo","");
			} 

			

			//Validar portada
			if($portada["portada_tmp"] != ""){
				$validar_portada = validator::make($portada,[
					"portada_tmp" =>'required|image|mimes:jpeg, jpg, png|max:3000000'
				]);

				if($validar_portada->fails())
					return redirect("/")->with("no-validation-portada","");
			} 

			

			//Validar icono
			if($icono["icono_tmp"] != ""){
				$validar_icono = validator::make($icono,[
					"icono_tmp" =>'required|image|mimes:jpeg, jpg, png|max:3000000'
				]);

				if($validar_icono->fails())
					return redirect("/")->with("no-validation-icono","");
			} 


			if ($validar->fails()) {
				return redirect("/")->with("no-validation", "");
			}else{

				if($logo["logo_tmp"] != ""){
					unlink($datos['logo_actual']);
					$aleatorio = mt_rand(1, 1000000);
					$ruta_logo = "img/blog/".$aleatorio."lg".$datos['logo_actual']->guessExtension();
					move_uploaded_file($logo["logo_tmp"], $ruta_logo);
				}else{
					$ruta_logo = $datos['logo_actual'];
				}

				if($portada["portada_tmp"] != ""){
					unlink($datos['portada_actual']);
					$aleatorio = mt_rand(1, 1000000);
					$ruta_portada = "img/blog/".$aleatorio."pt".$datos['logo_actual']->guessExtension();
					move_uploaded_file($portada["logo_tmp"], $ruta_portada);
				}else{
					$ruta_portada = $datos['portada_actual'];
				}

				if($icono["icono_tmp"] != ""){
					unlink($datos['icono_actual']);
					$aleatorio = mt_rand(1, 1000000);
					$ruta_icono = "img/blog/".$aleatorio."in".$datos['logo_actual']->guessExtension();
					move_uploaded_file($logo["logo_tmp"], $ruta_icono);
				}else{
					$ruta_icono = $datos['icono_actual'];
				}

				$actualizar = array("dominio" => $datos['dominio'], 
									"server" => $datos['servidor'], 
									"titulo"=> $datos['titulo'], 
									"descripcion" => $datos['descripcion'], 
									"palabras_clave" => json_encode(explode(",", $datos['palabras_clave'])), 
									"redes_sociales" => $datos['redes_sociales'],
									"logo" => $ruta_logo,
									"portada" => $ruta_portada,
									"icono" => $ruta_icono
									);

				$blog = Blog::where("id", $id)->update($actualizar);
				return redirect("/")->with("ok", "");
			}
		}else{
			return redirect("/")->with("error", "");
		}

	}
	/*=====  End of Actualizar registgro  ======*/
	
    
}
