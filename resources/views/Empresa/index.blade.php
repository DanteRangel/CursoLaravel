@extends('layouts.app')
@section('content')
	<div class="container">

		<div class="row text-left" style="margin-top:2em;">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<a class="btn btn-default" href="{{url('admin/Empresa/create')}}" >Crear nueva empresa</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<table class="table table-responsive">
					<thead>
						<th>Nombre</th> 
						<th>Razón social</th>
						<th>Acciones</th>
					</thead>
					<tbody>
						@foreach($empresas as $empresa)
						<tr>
							<td>{{$empresa->nombre}}</td>
							<td>{{$empresa->razon_social}}</td>
							<td><span class="btn btn-info fa fa-edit" onclick="editar('{{$empresa->id}}')"></span>
								<span class="btn btn-danger fa fa-trash-o" onclick="eliminar('{{$empresa->id}}')"></span></td>
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
		window.location.href="{{url('admin/Empresa')}}/"+id+'/edit';

	}
	function eliminar(id){

		$('#form_delete').attr('action','{{url("admin/Empresa")}}/'+id);
		$('#form_delete').submit();

	}
	
</script>
@endsection