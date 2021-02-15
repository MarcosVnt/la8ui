<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Notaría Ordoño 16 León- Francisco Enrique Ledesma Muñiz</title>

		<!--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">-->
		<!--<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">-->

		<!--[if lte IE 8]><script src="{{ asset('assets/js/ie/html5shiv.js') }}" ></script><![endif]-->
		<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
		

		<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
		<script src="{{asset('/js/jquery.min-2.1.3.js')}}"></script>

		<!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('assets/css/ie8.css') }}" /><![endif]-->
		<meta name="Description" content="Notaría Dinámica que busca la máxima seguridad jurídica y eficiencia económica de las escrituras en ella otorgadas."/>
		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="right-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
             @section('Header')
             @show
			<!-- Header Fin -->

			

			<!-- Highlights -->
             @section('Right')
             @show

			<!-- Highlights fin-->



			<!-- Footer -->
				@section('Footer')
             @show

		    <!-- Footer fin-->

		    @section('content')
		    @show

		</div>

		<!-- Scripts -->

		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
		<script src="{{ asset('assets/js/skel.min.js') }}"></script>
		<script src="{{ asset('assets/js/skel-viewport.min.js') }}"></script>
		<script src="{{ asset('assets/js/util.js') }}"></script>
		<!--[if lte IE 8]><script src="{{ asset('assets/js/ie/respond.min.js') }}"></script><![endif]-->
		<script src="{{ asset('assets/js/main.js') }}"></script>


		<!--app <script src="{{ asset('/js/jquery.min-2.1.3.js') }}"></script>
		<script src="{{ asset('/js/bootstrap.min-3.3.1.js') }}"></script>-->
	</body>
</html>