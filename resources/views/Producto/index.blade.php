@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-md-10 col-sm-10 col-xs-12 col-lg-10 col-md-offset-1">
			<div class="row text-left">
				<a href="{{url('admin/Producto/create')}}" class="btn btn-default"> Crear Producto</a>
			</div>
			<div class="row">
				<table class="table-responsive table">
					<thead>
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Precio</th>
						<th>Stock</th>
						<th>Acciones</th>
					</thead>
					<tbody>
					@foreach($productos as $producto)
						<tr>
							<td><img src="{{($producto->img!='')?$producto->img:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYFKq6PmTvLnYZcEot6o88UR_nRWEk4QeagdNZf_AmecTCsFM5-U-Hnw'}}" alt="" class="img-responsive" width="30px"></td>
							<td>{{$producto->nombre}}</td>
							<td>{{$producto->descripcion}}</td>
							<td>${{$producto->precio}}</td>
							<td>{{$producto->stock}}</td>
							<td><span class="fa fa-edit btn btn-info" onclick="editar('{{$producto->id}}')"></span>
							<span class="fa fa-trash btn btn-danger" onclick="eliminar('{{$producto->id}}')"></span></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	{!!Form::open(['method'=>'POST','id'=>'delete_form'])!!}
	{{method_field('DELETE')}}

	{!!Form::close()!!}
@endsection
@section('js')
	<script>
		function eliminar(id){
			$('#delete_form').attr('action','{{url("admin/Producto/")}}/'+id);
			$('#delete_form').submit();
		}
		function editar(id){
			window.location="{{url('admin/Producto')}}/"+id+'/edit';
		}
	</script>
@endsection