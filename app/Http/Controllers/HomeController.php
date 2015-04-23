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
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user =  Auth::user();//->with('studyplans.studymodules')->get();

		if ($user->role == 'student'){


			$user_data = $user->studyplans()->with('studymodules')->get();


			foreach ($user_data as $key => $value) {

				$user_data[$key]['totalcredits'] = 0 ;

				foreach ( $user_data[$key]['studymodules'] as $studymodule){

					if($studymodule['accomplished']){
					$user_data[$key]['totalcredits'] += $studymodule['credits'];
					}
				}

			}


		return view('home', compact('user', 'user_data','accomplished_credits'));

	} else if($user->role == 'teacher-tutor') {

				//$students = DB::table('users')
				//->leftJoin('study_plans', 'users.id', '=', 'study_plans.user_id')
				//->where('tutor_id', '=' , $user->id)
				//->get();

				$students = DB::table('users')
											->select(DB::raw('users.id, "firstName", "lastName", "studentNumber", email, count(study_plans.id) as studyplans'))
											->leftJoin('study_plans', 'users.id', '=', 'study_plans.user_id')
											->where('tutor_id', '=', $user->id)
                     	->groupBy('users.id')
                     	->get();



				//return $students;
				//return $user->with('student')->get();

				return view('home', compact('user', 'students'));

	}

	}

}
