@extends('app')

@section('content')
<div class ="container">

  <div class ="col-md-10 col-md-offset-1">
    <h1>HOPS-Kysely lukuvuodelle {{ $currentYear }}</h1>

    <div class="alert alert-info" role="alert">
      <p>
      Tässä suunnitelmassa olevia tietoja käsitellään luottamuksellisina. Lomakkeisiin tulevat pääsemään käsiksi vain opettajatutorisi ja opettajatutoreiden yhdyshenkilö. Lomakkeiden tietoja tullaan käyttämään opettajatutorointia edistäviin yhteenvetoihin, jolloin tietoja ei enää voi yhdistää henkilöön.
      </p>
    </div>

  </div>

  <div class ="col-md-10 col-md-offset-1">

    @if ($errors->any())

      <ul class = "alert alert-danger">

        @foreach ($errors->all() as $error)

        <li>{{$error}}</li>

        @endforeach
      </ul>

    @endif

  {!! Form::model($studyplan = new \App\Studyplan, ['url'=>'studyplans'])!!}
    <div class = "row">

      <div class = "form-group col-md-4">
        {!! Form::label('academic_year', 'Lukuvuosi') !!}
        {!! Form::select('academic_year',$academicYears, null, ['class'=>'form-control']) !!}
      </div>



    </div>

  <h2>Opintosuunnitelmani</h2>

  <h3><span class ="autumn">Syyslukukaudella</span> <span id = "academicYear"></span> aion suorittaa seuraavat opintojaksot:</h3>


    <section id = "autumnStudies">
    <div class = "row autumnModule">

      <div class = "form-group col-md-4">
        {!! Form::label('autumn_module_names', 'Opintojakson nimi') !!}
        {!! Form::text('autumn_module_names[0]', null, ['class'=>'form-control module_name']) !!}
      </div>

      <div class = "form-group col-md-2">
        {!! Form::label('autumn_credits', 'Opintopisteet') !!}

        <input type ="number" name = "autumn_credits[0]" class ="form-control" value = "1" min="1" max="10" step ="0.5">



      </div>

      <div class = "form-group col-md-5">
        {!! Form::label('autumn_subjects', 'Oppiaine') !!}

        <select name = "autumn_subjects[0]" class ="form-control subject-select ">
            @foreach($subjects as $subject)
            <option value="{{ $subject }}">{{ $subject }}</option>
            @endforeach
        </select>

      </div>

      <div class = "form-group col-md-1">
        {!! Form::label('addRow', 'Lisää') !!}
        <button id = "addAutumnRow" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>

      </div>



    </div>


  </section>



  <hr>

  <h3><span class ="spring">Kevätlukukaudella</span> <span id = "academicYear"></span> aion suorittaa seuraavat opintojaksot:</h3>

  <p>
    Kevään valintasi luonnollisesti tarkentuvat, kun kevään tarkempi opetusohjelma on käytettävissä. Olisi kuitenkin erittäin hyvä, jos jo ennen koko lukuvuoden alkua Sinulla olisi suunnitelma myös kevääksi. Opettajatuutorisi ottaa Sinuun yhteyttä lukuvuoden aikana ja voit tällöin tarkentaa suunnitelmaasi. Laitosten verkkosivuilta löytyy tietoa kuluvan vuoden kevään opetuksesta, jota voit käyttää hyväksesi suunnittelussasi.
  </p>


  <section id = "springStudies">


  <div class = "row springModule">

    <div class = "form-group col-md-4">
      {!! Form::label('spring_module_names', 'Opintojakson nimi') !!}
      {!! Form::text('spring_module_names[0]', null, ['class'=>'form-control module_name']) !!}
    </div>

    <div class = "form-group col-md-2">
      {!! Form::label('spring_credits', 'Opintopisteet') !!}

      <input type ="number" name = "spring_credits[0]" class ="form-control" value="1" min="1" max="10" step ="0.5">



    </div>

    <div class = "form-group col-md-5">
      {!! Form::label('spring_subjects', 'Oppiaine') !!}
      <select name = "spring_subjects[0]" class ="form-control subject-select">

          @foreach($subjects as $subject)
          <option value="{{ $subject }}">{{ $subject }}</option>
          @endforeach
      </select>
    </div>

    <div class = "form-group col-md-1">
      {!! Form::label('addRow', 'Lisää') !!}
      <button id = "addSpringRow" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>

    </div>

  </div>

</section>
  <hr>

  <h3>Työskentely opiskeluaikana</h3>

  <div class = "row">
    <div class = "col-md-12">

      <div class="radio">
        <label>
          <input type="radio" name="has_job" id="has_job_false" value="false" checked>
          En ole töissä lukuvuoden aikana.
        </label>
      </div>

      <div class="radio">
        <label>
          <input type="radio" name="has_job" id="has_job_true" value="true">
          Olen töissä lukuvuoden aikana.
        </label>
      </div>

  </div>

    <div id = "work-situation" class = "col-md-12">
      <div class="form-group">


      {!! Form::label('job_description', 'Työn kuva on:') !!}
      {!! Form::text('job_description', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
      {!! Form::label('job_type', 'Työn laatu:') !!}

        <select name = "job_type" class ="form-control">
          <option selected disabled>Valitse seuraavista</option>

          <option value="kokopäivätyö">kokopäivätyö</option>
          <option value="osa-aikatyö">osa-aikatyö</option>


        </select>
      </div>

      <div class="form-group">
      {!! Form::label('job_hours', 'Työn määrä tunneissa per viikko:') !!}
      <input type="number" name="job_hours" min="0" max="100" step="1" value="0">

      </div>

    </div>

    <div class = "form-group col-md-12">

            {!! Form::label('job_explanation', 'Perusteluni sille, että olen / en ole töissä:') !!}
            {!! Form::textarea('job_explanation', null, ['id' => 'job-explanation', 'class'=>'form-control']) !!}

    </div>

  </div>

  <hr>
  @unless ($existingStudyplans == 0)
  <h3>Katsaus edelliseen lukuvuoteen!</h3>
  <h4>Edellisenä lukuvuonna sain suoritettua seuraavat opinnot (valitse)</h4>
  <table class ="table">
    <thead>
      <tr>
        <th>
          Nimi
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


  @foreach ($previousYearStudies->studymodules as $previousstudymodule)
<tr>
  <td>
    {{$previousstudymodule->module_name}}
  </td>
<td>
  {{$previousstudymodule->credits}}
</td>
<td>
  {{$previousstudymodule->subject}}
</td>
<td>
  <div class="checkbox">
    <label>
      <input type="checkbox" name ="studymodules_completed[]" value ="{{$previousstudymodule->id}}"> Suoritettu?
    </label>
  </div>
</td>
</tr>


  @endforeach
</tbody>
</table>
  <div class  = "row">
    <div class = "col-md-12">
      {!! Form::label('positive_feedback', 'Edellisen vuoden hyviä asioita olivat:') !!}
      {!! Form::textarea('positive_feedback', null, ['id'=>'positive-feedback','class'=>'form-control']) !!}

    </div>

    <div class = "col-md-12">
      {!! Form::label('negative_feedback', 'Edellisenä vuonna seuraavat asiat eivät sujuneet odotusteni mukaisesti:') !!}
      {!! Form::textarea('negative_feedback', null, ['id'=>'negative-feedback','class'=>'form-control']) !!}

    </div>

  </div>
  @endunless

  <h3>Tietojenkäsittelytieteissä minua tällä hetkellä kiinnostavat erityisesti seuraavat aiheet ja/tai alueet</h3>
  <div class = "row">
    <div class = "col-md-12">

    {!! Form::label('interest_in_own_field', 'Aiheet:') !!}
    {!! Form::textarea('interest_in_own_field', null, ['id'=>'interest-in-own-field','class'=>'form-control']) !!}

    </div>
  </div>

  <h3>Valinnaisina opintoina minua kiinnostavat erityisesti seuraavat aineet:</h3>
  <div class = "row">
    <div class = "col-md-12">

    {!! Form::label('optional_interest', 'Aiheet:') !!}
    {!! Form::textarea('optional_interest', null, ['id' => 'optional-interest','class'=>'form-control']) !!}

    </div>
  </div>

<div id = "form-bottom-notice" class="alert alert-info" role="alert">
  <p>
    Kiitos yhteistyöstä! Tämä lomake ja opettajatuutorointi on erityisesti suunniteltu palvelemaan Sinun tulevaisuuttasi!
  </p>
</div>



  <a href="/home" class = "btn btn-info">Peruuta</a>

  <div class = "form-group">
  {!! Form::submit('Tallenna', ['class'=> 'btn btn-primary form-control']) !!}
  </div>
</div>

</div>
  {!! Form::close()!!}
@stop
