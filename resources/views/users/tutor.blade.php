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
      Aloitusvuosi
    </th>
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

  @if ($student->year == 1)
  <tr>
    <td>
      {{$student->created_at->year}}
    </td>

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
      <a class = "btn btn-primary" href="{{ action('UsersController@edit',[$student->id]) }}">Tarkastele / muokkaa tietoja</a>
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
      Aloitusvuosi
    </th>
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

  @if ($student->year == 2)
  <tr>

    <td>
      {{$student->created_at->year}}
    </td>

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
      <a class = "btn btn-primary" href="{{ action('UsersController@edit',[$student->id]) }}">Tarkastele / muokkaa tietoja</a>
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
      Aloitusvuosi
    </th>
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

  @if ($student->year == 3)
  <tr>

    <td>
      {{$student->created_at->year}}
    </td>

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
      <a class = "btn btn-primary" href="{{ action('UsersController@edit',[$student->id]) }}">Tarkastele / muokkaa tietoja</a>
    </td>
  </tr>


  @endif

@endforeach
</table>
