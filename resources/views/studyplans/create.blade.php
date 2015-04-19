@extends('app')

@section('content')
<div class ="container">

  <div class ="col-md-8 col-md-offset-2">
    <h1>HOPS-Kysely lukuvuodelle 1</h1>

    <div class="alert alert-info" role="alert">
      <p>
      Tässä suunnitelmassa olevia tietoja käsitellään luottamuksellisina. Lomakkeisiin tulevat pääsemään käsiksi vain opettajatutorisi ja opettajatutoreiden yhdyshenkilö. Lomakkeiden tietoja tullaan käyttämään opettajatutorointia edistäviin yhteenvetoihin, jolloin tietoja ei enää voi yhdistää henkilöön.
      </p>
    </div>

  </div>

  <div class ="col-md-8 col-md-offset-2">

  {!! Form::model($studyplan = new \App\Studyplan, ['url'=>'studyplans'])!!}
    <div class = "row">

      <div class = "form-group col-md-4">
        {!! Form::label('academic_year', 'Lukuvuosi') !!}
        {!! Form::select('academic_year',$academicYears, null, ['class'=>'form-control']) !!}
      </div>



    </div>

  <h2>Opintosuunnitelmani</h2>

  <h3><span class ="autumn">Syyslukukaudella</span> <span id = "academicYear"></span> aion suorittaa seuraavat opintojaksot:</h3>

    @for ($i = 0; $i < $numberOfAutumnInputs; $i++)

    <div class = "row autumnModule">

      <div class = "form-group col-md-5">
        {!! Form::label('module_name', 'Opintojakson nimi') !!}
        {!! Form::text('module_name[]', null, ['class'=>'form-control module_name']) !!}
      </div>

      <div class = "form-group col-md-2">
        {!! Form::label('credits', 'Opintopisteitä') !!}

        <select name = "credits[]" class ="form-control credits-select">
          <option selected disabled>Valitse</option>
            @foreach($creditsAmounts as $creditAmount)
            <option value="{{ $creditAmount }}">{{ $creditAmount }}</option>
            @endforeach
        </select>

      </div>

      <div class = "form-group col-md-5">
        {!! Form::label('subject', 'Oppiaine') !!}

        <select name = "subject[]" class ="form-control subject-select ">
          <option selected disabled>Valitse seuraavista</option>
            @foreach($subjects as $subject)
            <option value="{{ $subject }}">{{ $subject }}</option>
            @endforeach
        </select>

      </div>



        {!! Form::input('hidden','semester_name[]','autumn') !!}


    </div>

    @endfor


  <hr>

  <h3><span class ="spring">Kevätlukukaudella</span> <span id = "academicYear"></span> aion suorittaa seuraavat opintojaksot:</h3>

  <p>
    Kevään valintasi luonnollisesti tarkentuvat, kun kevään tarkempi opetusohjelma on käytettävissä. Olisi kuitenkin erittäin hyvä, jos jo ennen koko lukuvuoden alkua Sinulla olisi suunnitelma myös kevääksi. Opettajatuutorisi ottaa Sinuun yhteyttä lukuvuoden aikana ja voit tällöin tarkentaa suunnitelmaasi. Laitosten verkkosivuilta löytyy tietoa kuluvan vuoden kevään opetuksesta, jota voit käyttää hyväksesi suunnittelussasi.
  </p>

  @for ($i = 0; $i < $numberOfSpringInputs; $i++)

  <div class = "row springModule">

    <div class = "form-group col-md-5">
      {!! Form::label('module_name', 'Opintojakson nimi') !!}
      {!! Form::text('module_name[]', null, ['class'=>'form-control module_name']) !!}
    </div>

    <div class = "form-group col-md-2">
      {!! Form::label('credits', 'Opintopisteitä') !!}
      <select name = "credits[]" class ="form-control credits-select">
        <option selected disabled>Valitse</option>
          @foreach($creditsAmounts as $creditAmount)
          <option value="{{ $creditAmount }}">{{ $creditAmount }}</option>
          @endforeach
      </select>
    </div>

    <div class = "form-group col-md-5">
      {!! Form::label('subject', 'Oppiaine') !!}
      <select name = "subject[]" class ="form-control subject-select">
        <option selected disabled>Valitse seuraavista</option>
          @foreach($subjects as $subject)
          <option value="{{ $subject }}">{{ $subject }}</option>
          @endforeach
      </select>
    </div>

  </div>
  {!! Form::input('hidden','semester_name[]','spring') !!}

  @endfor
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

    <div class = "col-md-12">
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
      {!! Form::input('number','job_hours', null, ['class'=>'form-control', 'min' => '0']) !!}
      </div>

    </div>

    <div class = "form-group col-md-12">

            {!! Form::label('job_explanation', 'Perusteluni sille, että olen / en ole töissä:') !!}
            {!! Form::textarea('job_explanation', null, ['id' => 'job-explanation', 'class'=>'form-control']) !!}

    </div>

  </div>

  <hr>

  <h3>Katsaus edelliseen lukuvuoteen!</h3>

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

  {!! Form::input('hidden', 'user_id', 1)!!}

  <div class = "form-group">
  {!! Form::submit('Tallenna', ['class'=> 'btn btn-primary form-control']) !!}
  </div>
</div>

</div>
  {!! Form::close()!!}
@stop
