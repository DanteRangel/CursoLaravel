@extends('layout')
@section('content')
	<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 col-md-offset-3">
		{{Form::model($user,['route'=>['User.update',$user->id]])}}
			@include('User.form')
		{{Form::close()}}
	</div>
@endsection