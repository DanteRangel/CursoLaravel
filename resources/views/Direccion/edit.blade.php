@extends('layouts.app')
@section('content') 
<div class="row">
	<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 col-md-offset-3">
		<div id="map" style="height:300px;width:100%"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 col-md-offset-3">
		{!!Form::open(['url'=>'admin/Direccion/'.$direccion->id, 'method' => 'POST','id'=>'form_create'])!!}
			{{method_field('PUT')}}
			<div class="form-group {{$errors->has('direccion_postal')?'has-error':''}}">
				<input type="hidden" name="latitud" id="latitud" value="{{$direccion->latitud}}">
				<input type="hidden" name="longitud" id="longitud" value="{{$direccion->longitud}}">
				<!--<label for="">direccion_postal</label>-->
				{!!Form::label('direccion_postal','Direccion Postal')!!}
				{!!Form::text('direccion_postal',old('direccion_postal',$direccion->direccion_postal),['class'=>'form-control' , 'placeholder'=>'Escribe tu direccion','id'=>'direccion_postal'])!!}
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
						<option {{($direccion->id_empresa==$empresa->id)?' selected ':' '}} value="{{$empresa->id}}">{{$empresa->nombre}}</option>
					@endforeach
				</select>
			</div>		
			<div class="form-group">
				<input type="submit" class="form-control" value="Guardar">
			</div>
		{!!Form::close()!!}

				{!!Form::open(['url'=>'admin/Direccion/'.$direccion->id, 'method' => 'POST'])!!}
			{{method_field('DELETE')}}
						<div class="form-group">
				<input type="submit" class="btn btn-danger" value="Eliminar">
			</div>
					{!!Form::close()!!}


	</div>
</div>



@endsection
@section('js')

	<script>
		$(document).ready(function(){
			$('#form_create').on('keyup keypress',function(e){
				var code=e.keyCode || e.which;
				if(code===13){
					e.preventDefault;
					return false;
				}
			});
		    $('#direccion_postal').keyup(function(e){

		    		if($(this).val()!=''){
			    		geocode();	
			    	}	 
		    	
		    	
		        
		    });
		});
	
	
		var latLng={ lat: {{$direccion->latitud}}, lng: {{$direccion->longitud}}} ;
		
		$(document).ready(function(){
			$('#direccion_postal').val('{{$direccion->direccion_postal}}');
			geocode(); 
		});
	</script>
	<script src="{{asset('js/map.js')}}"></script>


	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHdObH5kKxvZdBAfP2sQVrufBhiy3B8xY&callback=initMap"></script>
		
 
@endsection

