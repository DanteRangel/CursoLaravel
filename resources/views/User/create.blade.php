@extends('layout')

@section('content')
	<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 col-md-offset-3">
		<form action="{{url('User')}}" method="POST">
			@include('User.form')
		</form>
	</div>
@endsection

