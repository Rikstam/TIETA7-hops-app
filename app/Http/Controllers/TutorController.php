<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;

class TutorController extends Controller {

	public function __construct()
	{

		$this->middleware('auth');
		$this->middleware('isMasterTutor',['only' => ['show', 'destroy']]);

	}


	public function index()
	{
		$user =  Auth::user();

		$students = User::Students()->where('tutor_id', '=', $user->id )->orderBy('lastName', 'asc')->orderBy('firstName', 'asc')->get();

		$students->each(function($student){
			$student->year = $student->currentStudyYear();
		});


		return view('home.tutor', compact('user', 'students'));
	}

	public function show($id)
	{

		$user = User::findOrfail($id);

		$students = $this->getTutorsStudents( $user);

		//TODO DRY this functionality
		$students->each(function($student){
			$student->year = $student->currentStudyYear();
		});

		dd($students);
		//return view('admin.tutor', compact('user', 'students'));
	}

	public function destroy($id)
	{

	}

	private function getTutorsStudents(User $tutor)
	{
		$students = DB::table('users')
									->select(DB::raw('users.id, "firstName", "lastName", "studentNumber", email, count(study_plans.id) as studyplans'))
									->leftJoin('study_plans', 'users.id', '=', 'study_plans.user_id')
									->where('tutor_id', '=', $tutor->id)
									->groupBy('users.id')
									->get();

		return $students;
	}
}
