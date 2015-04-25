@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Profiilisi</div>

				<div class="panel-body">
				Olet kirjautuneena sisään: {{ $student->firstName}} {{ $student->lastName}}
				<br>
				<a href="/auth/logout">Kirjaudu ulos</a>

				</div>
			</div>


				@include('users.student')

@endsection
