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
      <table class = "table">
        <thead>
          <tr>

            <th>
              Etunimi
            </th>

            <th>
            Sukunimi
            </th>
            <th>
            Opiskelijanumero
            </th>
            <th>
              Opiskeluvuosi
            </th>
      <th>
      Sähköposti
      </th>
            <th>
              Puhelin
            </th>

            <th>
              Osoite
            </th>

          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
              {{$student->firstName}}
            </td>

            <td>
              {{$student->lastName}}
            </td>

            <td>
              {{$student->studentNumber}}
            </td>
            <td>
              {{count($student_data) + 1}}.
            </td>
            <td>
              {{$student->email}}
            </td>

            <td>
              {{$student->telephone}}
            </td>

            <td>
              {{$student->address}}
            </td>
          </tr>
        </tbody>
      </table>


</div>
</div>




</div>



@endsection
