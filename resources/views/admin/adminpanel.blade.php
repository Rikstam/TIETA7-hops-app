@extends('app')

@section('content')

<div class="container">
  <div class="row">

    <div class="col-md-12">

      <h1>Tuutorit</h1>

        <table class = "table">
<thead>
  <tr>
    <th>
Name
    </th>

    <th>
Email
    </th>
    <th>
      Opiskelijat
    </th>
    <th>
      Opiskelijat yhteensä
    </th>
  </tr>
</thead>
          @foreach ($tutors as $tutor)

            <tr>

            <td>
              {{$tutor->firstName}} {{$tutor->lastName}}
            </td>
            <td>
              {{$tutor->email}}
            </td>

            <td>
              <ul>


              @foreach($tutor->tutored_students as $tutored_student)
                <li>
              <a href = 'profile/{{$tutored_student->id}}'> {{$tutored_student->firstName}} {{$tutored_student->lastName}}</a>
                </li>
              @endforeach

            </ul>
            </td>

            <td>
              {{count($tutor->tutored_students)}}
            </td>
            <td>
              <h4>Valitse tuutorille {{$tutor->firstName}} {{$tutor->lastName}} opiskelijat tästä</h4>
              {!! Form::open(array('url'=>'admin', 'class'=> 'assignTutorForm')) !!}


              <select name = "tutored_students[]" class ="form-control credits-select" multiple>
                <option selected disabled>Valitse</option>
                  @foreach($students as $student)
                  <option value="{{ $student->id }}">{{ $student->firstName }} {{ $student->lastName }}</option>
                  @endforeach
              </select>
              {!!Form::input('hidden', 'tutor_id', $tutor->id) !!}
              {!! Form::submit('Tallenna', ['class'=> 'btn btn-primary form-control']) !!}

              {!! Form::close() !!}
            </td>
            </tr>


          @endforeach
        </table>




    </div>


  </div>

  <div class="row">

    <div class="col-md-12">

    </div>

  </div>

</div>


@stop
