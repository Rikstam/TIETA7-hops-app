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

		$students = User::Students()->where('tutor_id', '=', $user->id )->orderBy('lastName', 'asc')->orderBy('firstName', 'asc')->get();

		//TODO DRY this functionality
		$students->each(function($student){
			$student->year = $student->currentStudyYear();
		});

		return view('home.tutor', compact('user', 'students'));
	}

	public function destroy($id)
	{

	}

}
