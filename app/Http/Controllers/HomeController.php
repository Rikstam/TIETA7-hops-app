<?php namespace App\Http\Controllers;

use App\User;
use App\Studyplan;
use App\Studymodule;
use Auth;
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
		$user_data = $user->studyplans()->with('studymodules')->get();

		//dd($user_data);

		$user_data->each(function($ud){
			$credits = $ud->studymodules->filter(function($studymodule){
				return $studymodule->accomplished && $studymodule->semester_name == 'autumn';

				$credits->each(function($m){
					dd($m->credits);
				});

			});
			//dd($credits);
			$ud->springtotals = 0;

			$ud->autumntotals = $ud->studymodules->filter(function($studymodule){
				return $studymodule->accomplished && $studymodule->semester_name == 'spring';
			});

		});



		return $user_data;
		return view('home', compact('user', 'user_data','accomplished_credits'));
	}

}
