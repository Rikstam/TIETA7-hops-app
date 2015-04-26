@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Profiilisi</div>

				<div class="panel-body">
				Olet kirjautuneena sisään: {{ $user->firstName}} {{ $user->lastName}} <br>

        <a href="/home">Palaa</a>

        <a href="/auth/logout">Kirjaudu ulos</a>


				</div>
			</div>

      <h2>Opiskelijan tiedot</h2>


			<h3>
				Opintovuosi: {{ $student->year }}
			</h3>

			<hr>
      @if (Session::has('flash_message'))
      <div class ="large-12 columns">
        <div role="alert" class="alert-dismissible alert alert-success">
          {{Session::get('flash_message')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Sulje">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      @endif


			<h3>Muokkaa henkilötietoja</h3>
      {!! Form::open(['method'=> 'PATCH', 'url' => 'user/' . $student->id, 'class' => 'form-horizontal' ]) !!}

      <div class="form-group">
        <label for="firstName" class="col-md-4 control-label">Etunimi</label>
        <div class="col-md-8">



          <input type="text" class="form-control " name="firstName" value="{{$student->firstName}}">

          @if ($errors->has('firstName'))
            <div class="alert alert-danger" role="alert">
              <ul>
                @foreach ($errors->get('firstName') as $message)
                <li>{{$message}}</li>
                @endforeach
              </ul>
            </div>
          @endif

        </div>

      </div>

      <div class="form-group">
        <label class=" control-label  col-md-4">Sukunimi</label>
        <div class = "col-md-8"><input type="text" class="form-control" name="lastName" value="{{$student->lastName}}">

          @if ($errors->has('lastName'))
            <div class="alert alert-danger" role="alert">
              <ul>
                @foreach ($errors->get('lastName') as $message)
                <li>{{$message}}</li>
                @endforeach
              </ul>
            </div>
          @endif

        </div>
      </div>

      <div class="form-group">

        <label class=" control-label  col-md-4">Email</label>
        <div class = "col-md-8"><input type="email" class="form-control" name="email" value="{{$student->email}}">

          @if ($errors->has('email'))
            <div class="alert alert-danger" role="alert">
              <ul>
                @foreach ($errors->get('email') as $message)
                <li>{{$message}}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class=" control-label col-md-4">Puhelin</label>
        <div class = "col-md-8"><input type="text" class="form-control" name="telephone" value ="{{$student->telephone}}">

          @if ($errors->has('telephone'))
            <div class="alert alert-danger" role="alert">
              <ul>
                @foreach ($errors->get('telephone') as $message)
                <li>{{$message}}</li>
                @endforeach
              </ul>
            </div>
          @endif

        </div>
      </div>

      <div class="form-group">
        <label  class=" control-label col-md-4">Osoite</label>
        <div class = "col-md-8"><textarea  name = "address">{{$student->address}}</textarea>
          @if ($errors->has('address'))
            <div class="alert alert-danger" role="alert">
              <ul>
                @foreach ($errors->get('address') as $message)
                <li>{{$message}}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>

      </div>
      <div class="form-group">
        <label class=" control-label col-md-4">Opiskelijanumero</label>
        <div class = "col-md-8"><input type="number" class="form-control" name="studentNumber" value="{{$student->studentNumber}}">

          @if ($errors->has('studentNumber'))
            <div class="alert alert-danger" role="alert">
              <ul>
                @foreach ($errors->get('studentNumber') as $message)
                <li>{{$message}}</li>
                @endforeach
              </ul>
            </div>
          @endif

        </div>
      </div>

      {!! Form::submit('Päivitä', ['class' => 'btn btn-primary']) !!}

      {!! Form::close() !!}

			<hr>
</div>
</div>




</div>



@endsection
