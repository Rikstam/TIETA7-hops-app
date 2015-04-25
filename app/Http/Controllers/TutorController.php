<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use DB;

class TutorController extends Controller {

	public function __construct()
	{

		$this->middleware('auth');
		$this->middleware('isMasterTutor',['only' => ['show', 'destroy']]);

	}


	public function show($id)
	{

		$user = User::findOrfail($id);

		$students = DB::table('users')
									->select(DB::raw('users.id, "firstName", "lastName", "studentNumber", email, count(study_plans.id) as studyplans'))
									->leftJoin('study_plans', 'users.id', '=', 'study_plans.user_id')
									->where('tutor_id', '=', $user->id)
									->groupBy('users.id')
									->get();
		dd($students);
		//return view('admin.tutor', compact('user', 'students'));
	}

}
