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
      Students
    </th>
  </tr>
</thead>
          @foreach ($tutors as $tutor)

            <tr>

            <td>
              {{$tutor->firstName}}
            </td>
            <td>
              {{$tutor->email}}
            </td>

            <td>
              <ul>


              @foreach($tutor->tutored_students as $tutored_student)
                <li>
              {{$tutored_student->firstName}}
              {{$tutored_student->firstName}}
                </li>
              @endforeach

            </ul>
            </td>
            <td>
              <h3>Valitse tuutorille opiskelijat tästä</h3>
              {!! Form::open(array('url'=>'admin')) !!}

              {{--{!! Form::select('tutored_students[]', $students, null, ['id'=>'student_list','class' => 'form-control', 'multiple'])!!} --}}

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
