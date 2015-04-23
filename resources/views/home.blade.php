@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Profiilisi</div>

				<div class="panel-body">
				Olet kirjautuneena sisään: {{ $user->firstName}} {{ $user->lastName}}
				</div>
			</div>

			@if ($user->role == 'student')
				@include('users.student')
			@elseif ($user->role == 'teacher-tutor')
				@include('users.tutor')
			@endif
@endsection
