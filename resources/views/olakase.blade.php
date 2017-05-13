@extends('layout')

@section('content')
<br>	
HOla estoy saludando desde olakase.blade.php

	<table>
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Telefono</th>
			<th>Acciones</th>
		</thead>
		@foreach($usuarios as $usuario)
			<tr>
				<td>{{$usuario->nombre}}</td>
				<td>{{$usuario->correo}}</td>
				<td>{{$usuario->telefono}}</td>
				<td>{{$usuario->id}}</td>
			</tr>

		@endforeach
	</table>
@endsection