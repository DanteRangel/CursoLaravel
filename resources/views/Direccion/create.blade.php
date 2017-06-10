@extends('layouts.app')

@section('content')
	<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 col-md-offset-3">
		{!!Form::open(['url'=>'admin/Direccion', 'method' => 'POST'])!!}
			<div class="form-group {{$errors->has('direccion_postal')?'has-error':''}}">
				<!--<label for="">direccion_postal</label>-->
				{!!Form::label('direccion_postal','Direccion Postal')!!}
				{!!Form::text('direccion_postal',old('direccion_postal'),['class'=>'form-control' , 'placeholder'=>'Escribe tu direccion'])!!}
				@if($errors->has('direccion_postal'))
					<span class="help-error">
						<strong>{{$errors->first('direccion_postal')}}</strong>
					</span>
				@endif	
			</div>	
			<div class="form-group {{$errors->has('id_empresa')?'has-error':''}}">
				<!--<label for="">direccion_postal</label>-->
				<select name="id_empresa" id="id_empresa" class="form-control">
					@foreach($empresas as $empresa)
						<option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
					@endforeach
				</select>
			</div>		
			<div class="form-group">
				<input type="submit" class="form-control" value="Enviar">
			</div>
		{!!Form::close()!!}

	</div>
@endsection

