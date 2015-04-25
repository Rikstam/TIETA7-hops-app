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
		$user =  Auth::user();//->with('studyplans.studymodules')->get();




			$user_data = $user->studyplans()->with('studymodules')->get();

			//TODO use laravel collection methods to get credits per semester
			foreach ($user_data as $key => $value) {

				$user_data[$key]['totalcredits'] = 0 ;

				foreach ( $user_data[$key]['studymodules'] as $studymodule){

					if($studymodule['accomplished']){
					$user_data[$key]['totalcredits'] += $studymodule['credits'];
					}
				}

			}


		return view('home.student', compact('user', 'user_data','accomplished_credits'));



	}

}
