<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('isTutorOrAdmin', ['only' => ['edit']]);
		$this->middleware('isMasterTutor', ['only' => ['index','destroy']]);

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return User::all();

		return User::with('studyplans.studymodules')->get();

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$user = Auth::user();
		$student =  User::findOrFail($id);


		//TODO DRY this is duplicated in HomeController@index
		$student_data  = $student->studyplans()->with('studymodules')->get();

		foreach ($student_data as $key => $value) {

			$student_data[$key]['totalcredits'] = 0 ;

			foreach ( $student_data[$key]['studymodules'] as $studymodule){

				if($studymodule['accomplished']){
					$student_data[$key]['totalcredits'] += $studymodule['credits'];
				}
			}

		}


	return view('home.student', compact('user','student', 'student_data','accomplished_credits'));



		//return $user_data;
		//return view('users.profile', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = Auth::user();
		$student =  User::findOrFail($id);


		//TODO DRY this is duplicated in HomeController@index
		$student_data  = $student->studyplans()->with('studymodules')->get();

		foreach ($student_data as $key => $value) {

			$student_data[$key]['totalcredits'] = 0 ;

			foreach ( $student_data[$key]['studymodules'] as $studymodule){

				if($studymodule['accomplished']){
					$student_data[$key]['totalcredits'] += $studymodule['credits'];
				}
			}

		}


	return view('users.edit', compact('user','student', 'student_data','accomplished_credits'));


	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//TODO could move these to a updateUserRequest request
		$this->validate($request, [
			'firstName'=>'required',
			'lastName'=>'required',
			'email'=>'required|email',
			'telephone'=>'required',
			'address' => 'required',
			'studentNumber'=>'required'
			]);

		$user = User::findOrFail($id);



		$user->update($request->all());

		return redirect('profile/' . $user->id)->with([
			'flash_message' => 'Tiedo päivitetty!'
			]);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
