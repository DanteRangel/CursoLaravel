@extends('layouts.app')

@section('content')
<button onclick="ver()">ver</button>
<div class="container">
	{!!Form::open(['url'=>'admin/Producto', 'method' => 'POST','enctype'=>'multipart/form-data'])!!}
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
			<div class="fileinput fileinput-new" data-provides="fileinput">
				<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
					<img src="http://via.placeholder.com/140x140" alt="...">
				</div>
				<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
				<div>
					<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="file_image" id="file_file"></span>
					<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
				</div>
			</div>
								@if($errors->has('file_image'))
						<span class="help-error">
							<strong>{{$errors->first('file_image')}}</strong>
						</span>
						@endif	
		</div>
		<input type="file" name="prueba">
		<div class="col-md-9 col-xs-12 col-lg-9 col-sm-9">
			<div class="row">
				<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
					<div class="form-group {{$errors->has('nombre')?'has-error':''}}">
						{!!Form::label('nombre','Nombre')!!}
						{!!Form::text('nombre',old('nombre'),['class'=>'form-control' , 'placeholder'=>'Escribe tu nonbre'])!!}
						@if($errors->has('nombre'))
						<span class="help-error">
							<strong>{{$errors->first('nombre')}}</strong>
						</span>
						@endif			
					</div>
				</div>
				<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
					<div class="form-group {{$errors->has('descripcion')?'has-error':''}}">
						{!!Form::label('descripcion','Descripción')!!}
						{!!Form::text('descripcion',old('descripcion'),['class'=>'form-control' , 'placeholder'=>'Escribe tu nonbre'])!!}
						@if($errors->has('descripcion'))
						<span class="help-error">
							<strong>{{$errors->first('descripcion')}}</strong>
						</span>
						@endif			
					</div>
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
					<div class="form-group">
						{!!Form::label('marca','Marca')!!}
						<select name="id_marca" id="id_marca" class="form-control">
							@foreach($marcas as $marca)
							<option value="{{$marca->id}}">{{$marca->nombre}}</option>
							@endforeach
						</select>	
					</div>
				</div>
				<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
					<div class="form-group {{$errors->has('id_grupo')?'has-error':''}}">
						{!!Form::label('grupo','Grupo')!!}
						<select name="id_grupo" id="id_grupo" class="form-control">
							@foreach($grupos as $grupo)
							<option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
							@endforeach
						</select>			
					</div>
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
					<div class="form-group {{$errors->has('costo')?'has-error':''}}">
						{!!Form::label('costo','Costo')!!}
						{!!Form::number('costo',old('costo'),['class'=>'form-control' , 'placeholder'=>'Escribe el costo','step'=>'any'])!!}
						@if($errors->has('costo'))
						<span class="help-error">
							<strong>{{$errors->first('costo')}}</strong>
						</span>
						@endif			
					</div>
				</div>
				<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
					<div class="form-group {{$errors->has('precio')?'has-error':''}}">
						{!!Form::label('precio','Precio')!!}
						{!!Form::number('precio',old('precio'),['class'=>'form-control' , 'placeholder'=>'Escribe el precio','step'=>'any'])!!}
						@if($errors->has('precio'))
						<span class="help-error">
							<strong>{{$errors->first('precio')}}</strong>
						</span>
						@endif			
					</div>
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
					<div class="form-group {{$errors->has('stock')?'has-error':''}}">
						{!!Form::label('stock','Stock')!!}
						{!!Form::number('stock',old('stock'),['class'=>'form-control' , 'placeholder'=>'Escribe el stock','step'=>'any'])!!}
						@if($errors->has('stock'))
						<span class="help-error">
							<strong>{{$errors->first('stock')}}</strong>
						</span>
						@endif			
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="form-group">
		<input type="submit" class="form-control" value="Enviar">
	</div>
	{!!Form::close()!!}
</div>	

@endsection
@section('js')
	<script>
		$('.fileinput').fileinput()
		function ver(){
			console.log($('#file_file').val());
			console.log($('#file_file'));
		}
		
	</script>
@endsection
