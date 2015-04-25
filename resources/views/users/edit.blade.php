@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Profiilisi</div>

				<div class="panel-body">
				Olet kirjautuneena sisään: {{ $user->firstName}} {{ $user->lastName}} <br>
				<a href="/auth/logout">Kirjaudu ulos</a>

				</div>
			</div>

      <h2>Opiskelijan tiedot</h2>


      {!! Form::open(['method'=> 'PATCH', 'url' => 'user/' . $student->id, 'class' => 'form-horizontal' ]) !!}

      <div class="form-group">
        <label for="firstName" class="col-md-4 control-label">Etunimi</label>
        <div class="col-md-8">
          <input type="text" class="form-control " name="firstName" value=" {{$student->firstName}} ">

        </div>

      </div>

      <div class="form-group">
        <label class=" control-label  col-md-4">Sukunimi</label>
        <div class = "col-md-8"><input type="text" class="form-control" name="lastName" value=" {{$student->lastName}} "></div>
      </div>

      <div class="form-group">

        <label class=" control-label  col-md-4">Email</label>
        <div class = "col-md-8"><input type="email" class="form-control" name="email" value="{{$student->email}}"></div>
      </div>
      <div class="form-group">
        <label class=" control-label col-md-4">Puhelin</label>
        <div class = "col-md-8"><input type="text" class="form-control" name="telephone" value ="{{$student->telephone}}"></div>
      </div>

      <div class="form-group">
        <label  class=" control-label col-md-4">Osoite</label>
        <div class = "col-md-8"><textarea  name = "address">{{$student->address}}</textarea></div>

      </div>
      <div class="form-group">
        <label class=" control-label col-md-4">Opiskelijanumero</label>
        <div class = "col-md-8"><input type="number" class="form-control" name="studentNumber" value="{{$student->studentNumber}}"></div>
      </div>

      {!! Form::submit('Päivitä', ['class' => 'btn btn-primary']) !!}

      {!! Form::close() !!}

</div>
</div>




</div>



@endsection
