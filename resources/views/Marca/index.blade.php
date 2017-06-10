@extends('layouts.app')
@section('content')
	<div class="container">

		<div class="row text-left" style="margin-top:2em;">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<a class="btn btn-default" href="{{url('/admin/Marca/create')}}" >Crear nueva marca</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<table class="table table-responsive">
					<thead>
						<th>Nombre</th>
						<th>Descripción</th>
					</thead>
					<tbody>
						@foreach($marcas as $marca)
							<tr>
								<td>{{$marca->nombre}}</td>
								<td>{{$marca->descripcion}}</td>
								<td><span class="btn btn-info fa fa-edit" onclick="editar('{{$marca->id}}')"></span>
								<span class="btn btn-danger fa fa-trash-o" onclick="eliminar('{{$marca->id}}')"></span></td>
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
		window.location.href="{{url('/admin/Marca')}}/"+id+'/edit';

	}
	function eliminar(id){

		$('#form_delete').attr('action','{{url("/admin/Marca")}}/'+id);
		$('#form_delete').submit();

	}
	
</script>
@endsection