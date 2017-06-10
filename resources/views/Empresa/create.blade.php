@extends('layouts.app')

@section('content')
	<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 col-md-offset-3">
		{!!Form::open(['url'=>'admin/Empresa', 'method' => 'POST'])!!}
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
			<div class="form-group {{$errors->has('razon_social')?'has-error':''}}">
				<!--<label for="">Nombre</label>-->
				{!!Form::label('razon_social','Razón Social')!!}
				{!!Form::text('razon_social',old('razon_social'),['class'=>'form-control' , 'placeholder'=>'Escribe la Razón social'])!!}
				@if($errors->has('razon_social'))
					<span class="help-error">
						<strong>{{$errors->first('razon_social')}}</strong>
					</span>
				@endif	
			</div>		
			<div class="form-group">
				<input type="submit" class="form-control" value="Enviar">
			</div>
		{!!Form::close()!!}

	</div>
@endsection

