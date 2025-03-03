<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blog Admin</title>
	
	<!--=====================================
	=          Plugins Css          =
	======================================-->
	<!--Font Awesome-->
	<link href="{{ url('/') }}/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">

	<!--Bootstrap 4-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!--CSS de AdminLte (Plantilla)-->
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/plugins/adminlte.min.css">

	{{--Overlay scrollbar--}}
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

	{{--Tags Input--}}
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">

	{{--Summernote--}}
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/plugins/summernote/dist/summernote.min.css">

	<!--====  End of Section comment  ====-->
	
	<!--===================================
	=            Plugins de js            =
	====================================-->

	{{--JQuery--}}
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	{{--Popper--}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	{{--Bootstrap 4--}}
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	{{--Overlay scrollbar--}}
	<script type="text/javascript" src="{{ url('/') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

	{{--Tags Input--}}
	<script src="{{ url('/') }}/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>

	{{--Summernite--}}
	<script src="{{ url('/') }}/plugins/summernote/dist/summernote.min.js"></script>

	{{--CUSTOM scrollbar--}}
	<script src="{{ url('/') }}/js/plugins/adminlte.js"></script>
	
	{{--Custom.js--}}
	<script src="{{ url('/') }}/js/custom.js"></script>

	{{--Swet Alerts--}}
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!--====  End of Plugins de js  ====-->
	
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper" style="overflow-x: hidden;">
		@include('modulos.header');
		@include('modulos.aside');
		@yield('content');
		@include('modulos.footer');
	</div>
</body>
</html>