@extends('layouts.app')

@section('content')
	<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 col-md-offset-3">
		{!!Form::open(['url'=>'/admin/Marca', 'method' => 'POST'])!!}
			<div class="form-group {{$errors->has('nombre')?'has-error':''}}">
				<!--<label for="">Nombre</label>-->
				{!!Form::label('nombre','Nombre')!!}
				{!!Form::text('nombre',old('nombre'),['class'=>'form-control' , 'placeholder'=>'Escribe tu nonbre'])!!}
				@if($errors->has('nombre'))
					<span class="help-error">
						<strong>{{$errors->first('nombre')}}</strong>
					</span>
				@endif
			</div>
			<div class="form-group {{$errors->has('descripcion')?'has-error':''}}">
				{!!Form::label('descripcion','Descripción')!!}
				{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Escribe tu email'])!!}
				@if($errors->has('descripcion'))
					<span class="help-error">
						<strong>{{$errors->first('descripcion')}}</strong>
					</span>
				@endif
				<!--<input type="email" class="form-control" name="correo"  value="{{old('correo')}}">-->

			</div>
			<div class="form-group">
				<input type="submit" class="form-control" value="Enviar">
			</div>
		{!!Form::close()!!}

	</div>
@endsection

