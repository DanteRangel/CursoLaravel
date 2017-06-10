@extends('layouts.app')
@section('content')
	<div class="container">

		<div class="row text-left" style="margin-top:2em;">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<a class="btn btn-default" href="{{url('admin/User/create')}}" >Crear nuevo usuario</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<table class="table table-responsive">
					<thead>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Teléfono</th>
						<th>Tipo Usuario</th>
						<th>Empresa Asociada</th>
						<th>Cotizaciones ralizadas</th>
						<th>Acciones</th>
					</thead>
					<tbody>
						@foreach($usuarios as $usuario)
							<tr>
								<td>{{$usuario->nombre}}</td>
								<td>{{$usuario->correo}}</td>
								<td>{{$usuario->telefono}}</td>
								<td>{{$usuario->permiso->nombre}}</td>

								<td>{{$usuario->empresa->nombre}}</td>
								<td>{{(count($usuario->cotizaciones)==0)?'Ninguna':count($usuario->cotizaciones)}}</td>
								<td><span class="btn btn-info fa fa-edit" onclick="editar('{{$usuario->id}}')"></span>
								<span class="btn btn-danger fa fa-trash-o" onclick="eliminar('{{$usuario->id}}')"></span></td>
							</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
	{!!Form::open(['method'=>'POST','id'=>'form_delete'])!!}
		{{method_field('DELETE')}}
	{!!Form::close()!!}

@endsection
@section('js')
<script>

	function editar(id){
		window.location.href="{{url('admin/User')}}/"+id+'/edit';

	}
	function eliminar(id){

		$('#form_delete').attr('action','{{url("admin/User")}}/'+id);
		$('#form_delete').submit();

	}
	
</script>
@endsection