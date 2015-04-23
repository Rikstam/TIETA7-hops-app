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


		foreach ($user_data as $key => $value) {

			$user_data[$key]['totalcredits'] = 0 ;

			foreach ( $user_data[$key]['studymodules'] as $studymodule){

				if($studymodule['accomplished']){
				$user_data[$key]['totalcredits'] += $studymodule['credits'];
				}
			}

		}


		//dd($user_data);
		//$user_data->credits = 0;

	//	$user_data->each(function($ud){

		//	$ud->total_credits = 0;

			//$calculateCredits = 0;

			//$ud->$calculateCredits = $ud->studymodules->map(function($studymodule){

			//	$ud->total_credits += $studymodule->credits;
			//return $studymodule->credits ;

			//});

			//$ud->total_credits = $calculateCredits;

	//	});


	//	$user_data->studymodules->each(function($module){

		//	$user_data->credits += $module->

	//	});

/*
		$user_data->each(function($ud){
			$credits = $ud->studymodules->filter(function($studymodule){
				return $studymodule->accomplished && $studymodule->semester_name == 'autumn';



			});
			//dd($credits);
			$ud->springtotals = 0;

			$ud->autumntotals = $ud->studymodules->filter(function($studymodule){
				return $studymodule->accomplished && $studymodule->semester_name == 'spring';
			});

		});
*/


	//return $user_data;
	return view('home', compact('user', 'user_data','accomplished_credits'));
	}

}
