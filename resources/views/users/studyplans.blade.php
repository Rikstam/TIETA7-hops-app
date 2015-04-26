@unless ( $student_data->isEmpty() )
<h2>Opintosuunnitelmat</h2>

  @foreach ($student_data as $key => $studyplan)

  <h3>{{$key + 1}}. Lukukausi {{$studyplan->academic_year}}</h3>
  <h4>  Lukuvuoden opintopisteet yhteensä : {{$studyplan->autumn_totalcredits + $studyplan->spring_totalcredits}}</h4>

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
<tr>
  <td>
    Syksyn suoritetut pisteet yhteensä : {{$studyplan->autumn_totalcredits}}
  </td>
</tr>
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

    <tr>
      <td>
        Kevään suoritetut pisteet yhteensä : {{$studyplan->spring_totalcredits}}
      </td>
    </tr>
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
