@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Etunimi</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Sukunimi</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Opiskelijanumero</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="studentNumber" value="{{ old('studentNumber') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Osoite</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" value="{{ old('address') }}">
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-4 control-label">Puhelinnumero</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Salasana</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Salasana uudestaan</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Luo tili
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
