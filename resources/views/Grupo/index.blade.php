@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row" style="margin-top:1em;">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				@if(Session::has('update'))
				<div class="alert alert-info">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Success!</strong> {{Session::get('update')}}
				</div>
				@endif
				@if(Session::has('delete'))
					<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> {{Session::get('delete')}}
					</div>
				@endif
				@if(Session::has('create'))

					<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> {{Session::get('create')}}
					</div>
				@endif
			</div>
		</div>
		<div class="row text-left" style="margin-top:2em;">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<a class="btn btn-default" href="{{url('admin/Grupo/create')}}" >Crear nuevo usuario</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-sm-8 col-lg8 col-xs-12 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<table class="table table-responsive">
					<thead>
						<th>Nombre</th> 
						<th>Acciones</th>
					</thead>
					<tbody>
						@foreach($grupos as $grupo)
							<tr>
								<td>{{$grupo->nombre}}</td>
								<td><span class="btn btn-info fa fa-edit" onclick="editar('{{$grupo->id}}')"></span>
								<span class="btn btn-danger fa fa-trash-o" onclick="eliminar('{{$grupo->id}}')"></span></td>
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
		window.location.href="{{url('admin/Grupo')}}/"+id+'/edit';

	}
	function eliminar(id){

		$('#form_delete').attr('action','{{url("admin/Grupo")}}/'+id);
		$('#form_delete').submit();

	}
	
</script>
@endsection