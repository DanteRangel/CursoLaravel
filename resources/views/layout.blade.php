<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cotizador</title>
	<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
	@yield('css')
</head>
<body>
	<div class="container">
		@yield('content')
	</div>

<script src="{{asset('/js/jquery.min.js')}}"/>
<script src="{{asset('/js/bootstrap.min.js')}}"/>
@yield('js')

</body>

</html>