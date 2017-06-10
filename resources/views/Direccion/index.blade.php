@extends('layouts.app')
@section('content')
	<div class="container">

		<div class="row text-left" style="margin-top:2em;">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<a class="btn btn-default" href="{{url('admin/Direccion/create')}}" >Crear nueva Direccion</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<table class="table table-responsive">
					<thead>
						<th>Direccion</th> 
						<th>Empresa</th>
					</thead>
					<tbody>
						@foreach($direcciones as $direccion)
						<tr>
							<td>{{$direccion->direccion_postal}}</td>
							<td>{{$direccion->empresa->nombre}}</td>
							<td><span class="btn btn-info fa fa-edit" onclick="editar('{{$direccion->id}}')"></span>
								<span class="btn btn-danger fa fa-trash-o" onclick="eliminar('{{$direccion->id}}')"></span></td>
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
		window.location.href="{{url('admin/Direccion')}}/"+id+'/edit';

	}
	function eliminar(id){

		$('#form_delete').attr('action','{{url("admin/Direccion")}}/'+id);
		$('#form_delete').submit();

	}
	
</script>
@endsection