<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use Auth;

class AdminController extends Controller {


	public function __construct()
	{

		$this->middleware('auth');
		$this->middleware('isMasterTutor');

	}

	public function adminpanel()

	{
		$user = Auth::user();
		$students = User::Students()->orderBy('lastName', 'asc')->orderBy('firstName', 'asc')->get();


		$students->each(function($student){
			$student->year = $student->currentStudyYear();
		});

		$tutors 	= User::Teachertutors()->with('tutored_students')->get();
		//return $tutors;
		return  view('admin.adminpanel', compact('students', 'tutors','user'));
	}


	public function allocateStudents(Request  $request){

		$input = $request->all();

		$studentIds = $input['tutored_students'];
		$tutorId = $input['tutor_id'];

		foreach ($studentIds as $studentId) {

				$student = User::findOrFail($studentId);
				$student->tutor_id = $tutorId;
				$student->save();


		}
		//dd($studentIds);
		return redirect('admin');
		//return $input;
	}

}
