<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Studyplan;
use App\Studymodule;
use Auth;

use Illuminate\Http\Request;

class StudyPlansController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return User::with('studyplans.studymodules')->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$user = Auth::user();

		$currentYear = $user->currentStudyYear();


		$existingStudyplans = $user->studyplans->count();
		if (	$existingStudyplans > 0) {

			$previousYearStudies = $user->studyplans()->orderBy('created_at', 'desc')->with('studymodules')->first();


		}

		$numberOfAutumnInputs = 2;
		$numberOfSpringInputs = 2;

		$academicYears = [
			'2014-2015' => '2014 - 2015',
			'2015-2016' => '2015 - 2016',
			'2016-2017' => '2016 - 2017',
			'2017-2018' => '2017 - 2018',
			'2018-2019' => '2018 - 2019'
		];

		$creditsAmounts = [0.5];

		for ($i=1; $i<11; $i++){
			array_push($creditsAmounts, $i);
			array_push($creditsAmounts, $i + 0.5);
		}




		$subjects = [
			'Tietojenkäsittelytieteiden tutkinto-ohjelma',
			'Matematiikan ja tilastotieteen tutkinto-ohjelma',
			'Informaatiotutkimuksen ja interaktiivisen median tutkinto-ohjelma',
			'Bioteknologian tutkinto-ohjelma'
		];

			return view('studyplans.create', compact('currentYear','subjects', 'creditsAmounts', 'numberOfAutumnInputs', 'numberOfSpringInputs', 'academicYears', 'existingStudyplans','previousYearStudies' ));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateStudyPlanRequest $request)
	{


		//TODO replace these with proper validations



		$input = $request->all();

		return $input;

		$user = Auth::user();

		$positiveFeedback = isset($input['positive_feedback']) ? $input['positive_feedback'] : null;
		$negativeFeedback = isset($input['negative_feedback']) ? $input['negative_feedback'] : null;

		$jobDescription = isset($input['job_description']) ? $input['job_description'] : null;
		$jobType = isset($input['job_type']) ? $input['job_type'] : null;
		$jobHours = isset($input['job_hours']) ? $input['job_hours'] : null;

		$studyModulesCompleted = isset($input['studymodules_completed']) ? $input['studymodules_completed'] : null;

		if (isset($studyModulesCompleted) ) {
		$this->updateLastYearsModules($studyModulesCompleted );
		}

		$studyPlan =  new Studyplan(
			array(
			'positive_feedback' => $positiveFeedback,
			'negative_feedback' => $negativeFeedback,
			'academic_year' => $input['academic_year'],

			'has_job' => $input['has_job'],
			'job_description'  => $jobDescription,
			'job_type' => $jobType,
			'job_hours' => $jobHours,
			'job_explanation' => $input['job_explanation'],
			'interest_in_own_field' => $input['interest_in_own_field'],
			'optional_interest' => $input['optional_interest']
		)
		);


		//TODO fix this rather ugly hack that creates the study modules for insertion

		// get years from academic year string
		$semesterYears = explode('-', $studyPlan->academic_year);

		$modules = array(
			'names'=>$input['module_name'],
			'credits'=>$input['credits'],
			'subjects'=>$input['subject'],
			'semesters'=>$input['semester_name']
			);

		$moduleCount = count($modules['names']);


		//return $input;
		$studyPlan = $user->studyplans()->save($studyPlan);

		$allStudyModules = [];

		for($i = 0; $i < $moduleCount; $i++) {

			array_push(	$allStudyModules, new Studymodule(
				array(

					'module_name' => $modules['names'][$i],
					'credits' => $modules['credits'][$i],
					'subject' => $modules['subjects'][$i],
					'semester_name' => $modules['semesters'][$i],
					'semester_year' => $modules['semesters'][$i] == 'autumn' ? $semesterYears[0] : $semesterYears[1],

					)
				)
			);

		}

		//dd($allStudyModules);

		$studyPlan->studymodules()->saveMany($allStudyModules);
	//	return $input;
		return redirect('home');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

	private function updateLastYearsModules(Array $studyModulesCompleted){

			foreach (	$studyModulesCompleted as $studyModuleId) {
					$studyModuleToUpdate = Studymodule::find($studyModuleId);
					$studyModuleToUpdate->accomplished = true;
					$studyModuleToUpdate->save();
			}

	}

}
