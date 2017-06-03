@extends('layouts.app')

@section('content')
	<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 col-md-offset-3">
		{!!Form::open(['url'=>'admin/User', 'method' => 'POST'])!!}
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
			<div class="form-group {{$errors->has('correo')?'has-error':''}}">
				{!!Form::label('correo','Correo')!!}
				{!!Form::email('correo',null,['class'=>'form-control','placeholder'=>'Escribe tu email'])!!}
				@if($errors->has('correo'))
					<span class="help-error">
						<strong>{{$errors->first('correo')}}</strong>
					</span>
				@endif
				<!--<input type="email" class="form-control" name="correo"  value="{{old('correo')}}">-->

			</div>
			<div class="form-group {{$errors->has('telefono')?'has-error':''}}">
				{!!Form::label('telefono','Teléfono')!!}
				{!!Form::text('telefono',null,['class'=>'form-control' , 'placeholder'=>'Escribe tu telefono'])!!}
				@if($errors->has('telefono'))
					<span class="help-error">
						<strong>{{$errors->first('telefono')}}</strong>
					</span>
				@endif
			</div>
			<div class="form-group {{$errors->has('password')?'has-error':''}}" >
				{!!Form::label('password','Contraseña')!!}
				{!!Form::password('password',['class'=>'form-control','placeholder'=>'Escribe tu password'])!!}
				@if($errors->has('password'))
					<span class="help-error">
						<strong>{{$errors->first('password')}}</strong>
					</span>
				@endif
			</div>
			<div class="form-group">
				<input type="submit" class="form-control" value="Enviar">
			</div>
		{!!Form::close()!!}

	</div>
@endsection

