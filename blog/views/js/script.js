
/*=============================================
BANNER
=============================================*/

$(".fade-slider").jdSlider({

	isSliding: false,
	isAuto: true,
	isLoop: true,
	isDrag: false,
	interval:5000,
	isCursor: false,
	speed:3000

});

var alturaBanner = $(".fade-slider").height();

$(".bannerEstatico").css({"height":alturaBanner+"px"})


/*=============================================
ANIMACIONES SCROLL
=============================================*/

$(window).scroll(function(){

	var posY = window.pageYOffset;
	
	if(posY > alturaBanner){

		$("header").css({"background":"white"})

		$("header .logotipo").css({"filter":"invert(100%)"})

		$(".fa-search, .fa-bars").css({"color":"black"})

	}else{

		$("header").css({"background":"rgba(0,0,0,.5)"})

		$("header .logotipo").css({"filter":"invert(0%)"})

		$(".fa-search, .fa-bars").css({"color":"white"})

	}

})

/*=============================================
MENÚ
=============================================*/

$(".fa-bars").click(function(){

	$(".menu").fadeIn("fast");

})

$(".btnClose").click(function(e){

	e.preventDefault();

	$(".menu").fadeOut("fast");

})

/*=============================================
GRID CATEGORÍAS
=============================================*/

$(".grid figure, .gridFooter figure").mouseover(function(){

	$(this).css({"background-position":"right bottom"})

})

$(".grid figure, .gridFooter figure").mouseout(function(){

	$(this).css({"background-position":"left top"})

})

$(".grid figure, .gridFooter figure").click(function(){

	var vinculo = $(this).attr("vinculo");

	window.location = vinculo;

})

/*=============================================
PAGINACIÓN
=============================================*/
var paginas_totales = Number($(".pagination").attr('total_paginas'));
var pagina_actual = Number($(".pagination").attr('pagina_actual'));
//console.log(paginas_totales);
$(".pagination").twbsPagination({
	totalPages: paginas_totales,
	startPage: pagina_actual,
	visiblePages: 4,
	first: "Primero",
	last: "Último",
	prev: '<i class="fas fa-angle-left"></i>',
	next: '<i class="fas fa-angle-right"></i>'

}).on("page", function(evt, page){
	//console.log("page",page);
	here = window.location;
	here = here.toString();
	here = here.split('/blog/');
	if(here[1] == "" ){
		window.location = global_apiserver + page;
	}else{
		here[1] = here[1].toString();
		here 	= here[1].split(',');
		//alert(typeof(here[0]) + ":" + here[0] + " y " + typeof(here[1]) + ":" + here[1]);
		if (here[1] != "" && here[0] != "") {
			//alert("un if"+ typeof(here[0]) + ":" + here[0] + " y " + typeof(here[1]) + ":" + here[1]);
			if (parseInt(here[0])) {
				window.location = global_apiserver + page;
			}else{
				window.location = global_apiserver + here[0] + "," + page;
			}	
		}else if (here[1] == "" && here[0] != ""){
			alert("segundo if");
			window.location = global_apiserver + here[0] + "," + page;
		}else{
			alert("tercer if");
			window.location = global_apiserver + page;
		}
	}
	

	
});


/*=============================================
SCROLL UP
=============================================*/

$.scrollUp({
	scrollText:"",
	scrollSpeed: 2000,
	easingType: "easeOutQuint"
})

/*=============================================
DESLIZADOR DE ARTÍCULOS
=============================================*/


$(".deslizadorArticulos").jdSlider({
	wrap: ".slide-inner",
	slideShow: 3,
	slideToScroll:3,
	isLoop: true,
	responsive: [{
		viewSize: 320,
		settings:{
			slideShow: 1,
			slideToScroll: 1
		}

	}]

})

$('.social-share').shapeShare({
	twitter: {
    account:'jqueryscript'
  },
  // bitly.com API here
  shortenUrl: {
    enable:true,
    apiKey:'R_cb9b7614dbd84e4b8aee2a4f25a2fda9',
    login:'o_65q884feb1'
  }

});