@extends('layout')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<table class="table table-responsive">
					<thead>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Teléfono</th>
						<th>Acciones</th>
					</thead>
					<tbody>
						@foreach($usuarios as $usuario)
							<tr>
								<td>{{$usuario->nombre}}</td>
								<td>{{$usuario->correo}}</td>
								<td>{{$usuario->telefono}}</td>
								<td><button class="btn btn-info" onclick="editar('{{$usuario->id}}')">Ver mas</button></td>
							</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
<script>

	function editar(id){
		window.location.href="{{url('/User')}}/"+id+'/edit';

	}
	
</script>
@endsection
@section('js')

@endsection