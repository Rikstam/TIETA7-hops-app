<?php namespace App\Http\Controllers;

use App\User;
use App\Studyplan;
use App\Studymodule;
use Auth;
use DB;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('redirectToTutor');

		$this->middleware('redirectToAdmin');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$student = Auth::user();//->with('studyplans.studymodules')->get();
		$tutor = null;

			if ($student->tutor_id) {
				$tutor = User::findOrFail($student->tutor_id);
			}




			$student_data = $student->studyplans()->with('studymodules')->get();

			$student->currentYear = $student->currentStudyYear();

			//return $student;
			//TODO use laravel collection methods to get credits per semester
			foreach ($student_data as $key => $value) {

				$student_data[$key]['autumn_totalcredits'] = 0 ;
				$student_data[$key]['spring_totalcredits'] = 0 ;

				foreach ( $student_data[$key]['studymodules'] as $studymodule){

					if($studymodule['accomplished'] && $studymodule['semester_name'] == 'autumn'){
					$student_data[$key]['autumn_totalcredits'] += $studymodule['credits'];
					}

					if($studymodule['accomplished'] && $studymodule['semester_name'] == 'spring'){
					$student_data[$key]['spring_totalcredits'] += $studymodule['credits'];
					}

				}

			}



		return view('home.student', compact('student','tutor', 'student_data', 'currentYear'));



	}

}
