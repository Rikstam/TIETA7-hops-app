
@if (Session::has('flash_message'))
<div class ="">
  <div role="alert" class="alert-dismissible alert alert-success">
    {{Session::get('flash_message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Sulje">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif

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
        Opintojen aloitusvuosi
      </th>

      <th>
        Opintovuosi
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
        {{$student->created_at->year}}
      </td>

      <td>
        {{$student->currentYear}}
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


@include('users.studyplans')


@if ($student_data->isEmpty())
<h2>Ei täytettyjä opintosuunnitelmia</h2>
<a href="studyplans/create" class ="btn btn-primary">Täytä ensimmäinen lomake</a>
@endif

@if (count($student_data) == 1)
<a href="studyplans/create" class ="btn btn-primary">Täytä toinen lomake</a>
@endif

@if (count($student_data) == 2)
<a href="studyplans/create" class ="btn btn-primary">Täytä kolmas lomake</a>
@endif

</div>
</div>
</div>
