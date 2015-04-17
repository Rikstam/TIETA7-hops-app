@extends('app')

@section('content')
<div class ="container">

  <div class ="col-md-12">
  <h1>HOPS-Kysely lukuvuodelle 1</h1>

  <div class="alert alert-info" role="alert">
    <p>
      Tässä suunnitelmassa olevia tietoja käsitellään luottamuksellisina. Lomakkeisiin tulevat pääsemään käsiksi vain opettajatutorisi ja opettajatutoreiden yhdyshenkilö. Lomakkeiden tietoja tullaan käyttämään opettajatutorointia edistäviin yhteenvetoihin, jolloin tietoja ei enää voi yhdistää henkilöön.
    </p>
  </div>

  </div>
  <div class ="col-md-12">
  {!! Form::model($studyplan = new \App\Studyplan, ['url'=>'studyplans'])!!}

  <div class = "form-group">
    {!! Form::label('academic_year', 'Lukuvuosi:') !!}
    {!! Form::select('academic_year_start',['2014 - 2015','2015 - 2016','2016 - 2017'], null, ['class'=>'form-control']) !!}
  </div>

  <h2>Opintosuunnitelmani</h2>
  <h3><span class ="autumn">Syyslukukaudella</span> <span id = "academicYear"></span> aion suorittaa seuraavat opintojaksot:</h3>

  <div class = "row">
    <div class = "form-group col-md-5">
    {!! Form::label('name', 'Opintojakson nimi') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-2">
    {!! Form::label('credits', 'Opintopisteitä') !!}
    {!! Form::select('credits',[1,2,3,4,5,6,7,8,9,10], null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-5">
    {!! Form::label('subject', 'Oppiaine') !!}
    {!! Form::select('subject',$subjects,null, ['class'=>'form-control']) !!}
    </div>

  </div>

  <div class = "row">
    <div class = "form-group col-md-5">
    {!! Form::label('name', 'Opintojakson nimi') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-2">
    {!! Form::label('credits', 'Opintopisteitä') !!}
    {!! Form::select('credits',[1,2,3,4,5,6,7,8,9,10], null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-5">
    {!! Form::label('subject', 'Oppiaine') !!}
    {!! Form::select('subject',$subjects,null, ['class'=>'form-control']) !!}
    </div>

  </div>

  <div class = "row">
    <div class = "form-group col-md-5">
    {!! Form::label('name', 'Opintojakson nimi') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-2">
    {!! Form::label('credits', 'Opintopisteitä') !!}
    {!! Form::select('credits',[1,2,3,4,5,6,7,8,9,10], null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-5">
    {!! Form::label('subject', 'Oppiaine') !!}
    {!! Form::select('subject',$subjects,null, ['class'=>'form-control']) !!}
    </div>

  </div>

  <div class = "row">
    <div class = "form-group col-md-5">
    {!! Form::label('name', 'Opintojakson nimi') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-2">
    {!! Form::label('credits', 'Opintopisteitä') !!}
    {!! Form::select('credits',[1,2,3,4,5,6,7,8,9,10], null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-5">
    {!! Form::label('subject', 'Oppiaine') !!}
    {!! Form::select('subject',$subjects,null, ['class'=>'form-control']) !!}
    </div>

  </div>

  <div class = "row">
    <div class = "form-group col-md-5">
    {!! Form::label('name', 'Opintojakson nimi') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-2">
    {!! Form::label('credits', 'Opintopisteitä') !!}
    {!! Form::select('credits',[1,2,3,4,5,6,7,8,9,10], null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-5">
    {!! Form::label('subject', 'Oppiaine') !!}
    {!! Form::select('subject',$subjects,null, ['class'=>'form-control']) !!}
    </div>

  </div>

  <hr>

  <h3><span class ="spring">Kevätlukukaudella</span> <span id = "academicYear"></span> aion suorittaa seuraavat opintojaksot:</h3>

  <p>
    Kevään valintasi luonnollisesti tarkentuvat, kun kevään tarkempi opetusohjelma on käytettävissä. Olisi kuitenkin erittäin hyvä, jos jo ennen koko lukuvuoden alkua Sinulla olisi suunnitelma myös kevääksi. Opettajatuutorisi ottaa Sinuun yhteyttä lukuvuoden aikana ja voit tällöin tarkentaa suunnitelmaasi. Laitosten verkkosivuilta löytyy tietoa kuluvan vuoden kevään opetuksesta, jota voit käyttää hyväksesi suunnittelussasi.
  </p>

  <div class = "row">
    <div class = "form-group col-md-5">
    {!! Form::label('name', 'Opintojakson nimi') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-2">
    {!! Form::label('credits', 'Opintopisteitä') !!}
    {!! Form::select('credits',[1,2,3,4,5,6,7,8,9,10], null, ['class'=>'form-control']) !!}
    </div>

    <div class = "form-group col-md-5">
    {!! Form::label('subject', 'Oppiaine') !!}
    {!! Form::select('subject',$subjects,null, ['class'=>'form-control']) !!}
    </div>

  </div>

  <div class = "row">
    <div class = "col-md-4">
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
          Olen töissä lukuvuoden aikana.
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
          En ole töissä lukuvuoden aikana.
        </label>
      </div>
    </div>

    <div class = "col-md-8">

      {!! Form::label('name', 'Työn kuva on:') !!}
      {!! Form::text('name', null, ['class'=>'form-control']) !!}


      {!! Form::label('name', 'Työn määrä:') !!}
      {!! Form::text('name', null, ['class'=>'form-control']) !!}


    </div>

  </div>

<div class="alert alert-info" role="alert">
  <p>
    Kiitos yhteistyöstä! Tämä lomake ja opettajatuutorointi on erityisesti suunniteltu palvelemaan Sinun tulevaisuuttasi!
  </p>
</div>



  <div class = "form-group">
  {!! Form::submit('Tallenna', ['class'=> 'btn btn-primary form-control']) !!}
  </div>
</div>

</div>
  {!! Form::close()!!}
@stop
