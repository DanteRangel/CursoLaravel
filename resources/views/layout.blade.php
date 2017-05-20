<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cotizador</title>
	<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	 <link href="{{asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
	@yield('css')

</head>
<body>
	<div class="container">
		@yield('content')
	</div>

	<script src="{{asset('/js/jquery.min.js')}}"></script>
	<script src="{{asset('/js/bootstrap.min.js')}}"></script>
	@yield('js')

</body>

</html>