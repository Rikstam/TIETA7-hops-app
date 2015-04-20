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

			<h2>Omat tiedot</h2>
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
							{{$user->firstName}}
						</td>

						<td>
							{{$user->lastName}}
						</td>

						<td>
							{{$user->studentNumber}}
						</td>

						<td>
							{{$user->email}}
						</td>

						<td>
							{{$user->telephone}}
						</td>

						<td>
							{{$user->address}}
						</td>
					</tr>
				</tbody>
			</table>
			@unless ( $user_data->isEmpty() )
			<h2>Opintosuunnitelmasi</h2>

				@foreach ($user_data as $studyplan)

				<h3>Lukukausi {{$studyplan->academic_year}}</h3>
				<p>
					Aiotut opintosuoritukset
				</p>
				<h4>Syksy</h4>


			<table class ="table">
				<thead>
					<tr>



					<th>
						Opintojakson nimi
					</th>
					<th>
						Opintopisteitä
					</th>
					<th>
						Oppiaine
					</th>
				</tr>
				</thead>

				<tbody>
						@foreach ($studyplan->studymodules as $studymodule)

							@if ($studymodule->semester_name == 'autumn')
						<tr>
							<td>
								{{$studymodule->module_name}}
							</td>

							<td>
								{{$studymodule->credits}}
							</td>

							<td>
								{{$studymodule->subject}}
							</td>

						</tr>
							@endif
						@endforeach

				</tbody>


			</table>

			<h4>Kevät</h4>


		<table class ="table">
			<thead>
				<tr>



				<th>
					Opintojakson nimi
				</th>
				<th>
					Opintopisteitä
				</th>
				<th>
					Oppiaine
				</th>
			</tr>
			</thead>

			<tbody>
					@foreach ($studyplan->studymodules as $studymodule)

						@if ($studymodule->semester_name == 'spring')
					<tr>
						<td>
							{{$studymodule->module_name}}
						</td>

						<td>
							{{$studymodule->credits}}
						</td>

						<td>
							{{$studymodule->subject}}
						</td>

					</tr>
						@endif
					@endforeach

			</tbody>


		</table>



				@endforeach
				<a href="studyplans/create" class ="btn btn-primary">Täytä uusi lomake</a>
			@endunless

			@if ($user_data->isEmpty())
			<h2>Ei täytettyjä opintosuunnitelmia</h2>
			<a href="studyplans/create" class ="btn btn-primary">Täytä uusi lomake</a>
			@endif
		</div>
	</div>
</div>
@endsection
