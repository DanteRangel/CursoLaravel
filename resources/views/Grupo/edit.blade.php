@extends('layouts.app')
@section('content')
	<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 col-md-offset-3">
		{!!Form::open(['url'=>'/admin/Grupo/'.$grupo->id, 'method' => 'POST'])!!}
		{{method_field('PUT')}}
		<!--<input type="hidden" name="_method" value="PUT">-->
		<div class="form-group {{$errors->has('nombre')?'has-error':''}}">
			<!--<label for="">Nombre</label>-->
			{!!Form::label('nombre','Nombre')!!}
			{!!Form::text('nombre',$grupo->nombre,['class'=>'form-control' , 'placeholder'=>'Escribe tu nobre'])!!}
			@if($errors->has('nombre'))
				<span class="help-error">
					<strong>{{$errors->first('nombre')}}</strong>
				</span>
			@endif
		</div>
		<div class="form-group">
			<input type="submit" class="form-control" value="Enviar">
		</div>
		{!!Form::close()!!}
		{!!Form::open(['url'=>'/admin/Grupo/'.$grupo->id, 'method'=>'POST'])!!}
			{{method_field('DELETE')}}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}

		{!!Form::close()!!}
	</div>
@endsection