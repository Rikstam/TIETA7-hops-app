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

<h3>Ensimmäisen vuoden opiskelijat</h3>
<table class = "table">

<thead>
  <tr>
    <th>
      Nimi
    </th>

    <th>
      Opiskelijanumero
    </th>

    <th>
      Email
    </th>
  </tr>
</thead>
@foreach ($students as $student)

  @if ($student->studyplans == 0)
  <tr>
    <td>
      {{$student->firstName}} {{$student->lastName}}
    </td>

    <td>
      {{$student->studentNumber}}
    </td>

    <td>
      {{$student->email}}
    </td>

    <td>
      <a class = "btn btn-primary" href="profile/{{$student->id}}">Katso opiskelijan tiedot</a>
    </td>

  </tr>


  @endif

@endforeach
</table>


<h3>Toisen vuoden opiskelijat</h3>
<table class = "table">

<thead>
  <tr>
    <th>
      Nimi
    </th>

    <th>
      Opiskelijanumero
    </th>

    <th>
      Email
    </th>
  </tr>
</thead>
@foreach ($students as $student)

  @if ($student->studyplans == 1)
  <tr>
    <td>
      {{$student->firstName}} {{$student->lastName}}
    </td>

    <td>
      {{$student->studentNumber}}
    </td>

    <td>
      {{$student->email}}
    </td>

    <td>
      <a class = "btn btn-primary" href="profile/{{$student->id}}">Katso opiskelijan tiedot</a>
    </td>
  </tr>


  @endif

@endforeach
</table>

<h3>Kolmannen vuoden opiskelijat</h3>
<table class = "table">

<thead>
  <tr>
    <th>
      Nimi
    </th>

    <th>
      Opiskelijanumero
    </th>

    <th>
      Email
    </th>
  </tr>
</thead>
@foreach ($students as $student)

  @if ($student->studyplans == 2 || $student->studyplans == 3)
  <tr>
    <td>
      {{$student->firstName}} {{$student->lastName}}
    </td>

    <td>
      {{$student->studentNumber}}
    </td>

    <td>
      {{$student->email}}
    </td>

    <td>
      <a class = "btn btn-primary" href="profile/{{$student->id}}">Katso opiskelijan tiedot</a>
    </td>
  </tr>


  @endif

@endforeach
</table>
