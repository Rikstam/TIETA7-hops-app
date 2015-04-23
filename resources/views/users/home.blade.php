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
							{{$user->firstName}}
						</td>

						<td>
							{{$user->lastName}}
						</td>

						<td>
							{{$user->studentNumber}}
						</td>
						<td>
							{{count($user_data) + 1}}.
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

				@foreach ($user_data as $key => $studyplan)

				<h3>{{$key + 1}}. Lukukausi {{$studyplan->academic_year}}</h3>
				<p>
					Opintopisteet yhteensä : {{$studyplan->totalcredits}}
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
					<th>
						Suoritettu?
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
							@if ($studymodule->accomplished)
							<td class="bg-success">

									Kyllä
							</td>

							@else
								<td class="bg-warning">
									Ei
								</td>
							@endif

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

				<th>
					Suoritettu?
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

							@if ($studymodule->accomplished)
							<td class="bg-success">

									Kyllä
							</td>

							@else
								<td class="bg-warning">
									Ei
								</td>
							@endif



					</tr>
						@endif
					@endforeach

			</tbody>


		</table>


		<h3>Työtilanne</h3>

		@if ($studyplan->has_job)
		<p>
			Töissä. <br>
			{{$studyplan->job_description}} <br>
			{{$studyplan->job_type}} <br>

			{{$studyplan->job_hours}} tuntia viikossa

		</p>
		@else
		<p>
			Ei töitä lukukauden aikana.
		</p>
		@endif

		<p>
			{{$studyplan->job_explanation}}
		</p>




			@if ($studyplan->positive_feedback)
			<h3>Lukuvuoden hyviä asioita olivat</h3>
			<p>
			{{$studyplan->positive_feedback}}
			</p>
			@endif




			@if ($studyplan->negative_feedback)
			<h3>Asiota jotka eivät sujuneet odotusteni mukaan lukukaudella</h3>
			<p>
			{{$studyplan->negative_feedback}}
			</p>
			@endif



		<h3>Kiinnostuksen kohteet omassa koulutusohjelmassa</h3>

		<p>
			{{$studyplan->interest_in_own_field}}
		</p>

		<h3>Kiinnostuksen kohteet valinnaisissa opinnoissa</h3>
<p>
	{{$studyplan->optional_interest}}
</p>


@endforeach
			@endunless

			@if ($user_data->isEmpty())
			<h2>Ei täytettyjä opintosuunnitelmia</h2>
			<a href="studyplans/create" class ="btn btn-primary">Täytä ensimmäisen vuoden lomake</a>
			@endif

			@if (count($user_data) == 1)
			<a href="studyplans/create" class ="btn btn-primary">Täytä toisen vuoden lomake lomake</a>
			@endif

			@if (count($user_data) == 2)
			<a href="studyplans/create" class ="btn btn-primary">Täytä kolmannen vuoden lomake lomake</a>
			@endif

		</div>
	</div>
</div>
@endsection
