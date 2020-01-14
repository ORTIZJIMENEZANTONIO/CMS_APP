//previsualizar imagenes temporales
$(document).on("change", "input[type='file']", function(){
	let img = this.files[0];
	let tipo = $(this).attr("name");
	//console.log("img", img);
	if(img["type"] != "image/jpeg" && img["type"] != "image/png"){
		show_error_alert("center", "Solo se admiten archivos en formato PNG y JPG");
	}else if(img["size"]>3000000){
		show_error_alert("center", "No se puede subir imágen mayor a 3 mb");
	}else{
		let datos_imagen = new FileReader;
		datos_imagen.readAsDataURL(img);
		$(datos_imagen).on("load", function(event){
			let ruta_img = event.target.result;
			if (tipo == "logo") {
				$(".previsualizar-img-logo").attr("src", ruta_img);
			} else if (tipo == "portada") {
				$(".previsualizar-img-portada").attr("src", ruta_img);
			} else if (tipo == "icono") {
				$(".previsualizar-img-icono").attr("src", ruta_img);
			}
		});
		
	}
});


$(document).ready(function(){
	$('.summernote').summernote();
});

//Agregar red
$(document).on("click",".agregar_red", function(){
	 let icono = $('#red_icono').val().split(",")[0];
	 let url = $('#red_url').val();
	 let color = $('#red_icono').val().split(",")[1];
	 //alert(color + icono);
	 $(".listado_redes").append(`
	 	<div class="form-group mb-3">
	 		<div class="input-group-prepend">
	 			<div class="input-group-text" style="background-color: `+ color +`;">
	 				<i class="`+ icono +` text-white"></i>
	 			</div>
	 			<input type="text" class="form-control" name="u" value="`+ url +`} ">
	 			<div class="input-group-text bg-danger" style="cursor: pointer;">
	 				<i class="rounded-circle bg-danger px-1 text-uppercase h5 m-0 eliminar_red" red="`+ url +`" icono="`+ icono +`">&times;</i>
	 			</div>
	 		</div>
	 	</div>
	 	`);

	 let listado_redes = JSON.parse($('#listado_update').val());
	 listado_redes.push({
	 	"icono": icono,
	 	"color": color,
	 	"url": url
	 });

	 $('#listado_update').val(JSON.stringify(listado_redes));
});

//Eliminar red
$(document).on('click', '.eliminar_red', function(){
	let lista_red = JSON.parse($('#listado_update').val());
	let red =  $(this).attr("red");
	let icono = $(this).attr("icono");
	for (var i = 0; i < lista_red.length; i++) {
		if(red == lista_red[i]["url"] && icono == lista_red[i]["icono"]){
			lista_red.splice(i, 1);
			$(this).parent().parent().parent().remove();
		}
		
	}
	$('#listado_update').val(JSON.stringify(lista_red));
});


/*===============================
=            Alertas            =
===============================*/
function show_alert(title, text){
	Swal.fire({
		title: title,
		text: text,
		icon: 'success',
		showCancelButton: false,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Ok'
	}).then((result) => {
		if (result.value) {
			window.location = window.location.href;
		}
	});
}

function show_success_alert(position, title){
	Swal.fire({
		position: position,
		icon: 'success',
		title: title,
		showConfirmButton: false,
		timer: 2000
	});
}

function show_error_alert(position, title){
	Swal.fire({
		position: position,
		icon: 'error',
		title: title,
		showConfirmButton: false,
		timer: 2000
	});
}
/*=====  End of Alertas  ======*/