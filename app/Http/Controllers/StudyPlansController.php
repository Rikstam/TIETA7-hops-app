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


		$academicYears = [
			'2014-2015' => '2014 - 2015',
			'2015-2016' => '2015 - 2016',
			'2016-2017' => '2016 - 2017',
			'2017-2018' => '2017 - 2018',
			'2018-2019' => '2018 - 2019'
		];

		$subjects = [
			'Tietojenkäsittelytieteiden tutkinto-ohjelma',
			'Matematiikan ja tilastotieteen tutkinto-ohjelma',
			'Informaatiotutkimuksen ja interaktiivisen median tutkinto-ohjelma',
			'Bioteknologian tutkinto-ohjelma'
		];

			return view('studyplans.create', compact('currentYear','subjects', 'academicYears', 'existingStudyplans','previousYearStudies' ));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateStudyPlanRequest $request)
	{


		//TODO tidy up some more

		$input = $request->all();

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

		$autumn_modules = array(
			'names'=>$input['autumn_module_names'],
			'credits'=>$input['autumn_credits'],
			'subjects'=>$input['autumn_subjects']
			);

		$spring_modules = array(
				'names'=>$input['spring_module_names'],
				'credits'=>$input['spring_credits'],
				'subjects'=>$input['spring_subjects']
		);
		$numberOfAutumnModules = count($autumn_modules['names']);

		$numberOfSpringModules = count($spring_modules['names']);




		$studyPlan = $user->studyplans()->save($studyPlan);

		$allStudyModules = [];

		//dd($autumn_modules);


		for($i = 0; $i < $numberOfAutumnModules; $i++) {

			array_push(	$allStudyModules, new Studymodule(
				array(

					'module_name' => $autumn_modules['names'][$i],
					'credits' => $autumn_modules['credits'][$i],
					'subject' => $autumn_modules['subjects'][$i],
					'semester_name' => 'autumn',
					'semester_year' => $semesterYears[0]

					)
				)
			);

		}

		for($i = 0; $i < $numberOfSpringModules; $i++) {

			array_push(	$allStudyModules, new Studymodule(
				array(

					'module_name' => $spring_modules['names'][$i],
					'credits' => $spring_modules['credits'][$i],
					'subject' => $spring_modules['subjects'][$i],
					'semester_name' => 'spring',
					'semester_year' => $semesterYears[1]

					)
				)
			);

		}


		//dd($allStudyModules);

		$studyPlan->studymodules()->saveMany($allStudyModules);
	//	return $input;
		return redirect('home')->with([
			'flash_message' => 'Tiedot päivitetty! Kiitos yhteistyöstä!
			Tämä lomake ja opettajatuutorointi on erityisesti suunniteltu palvelemaan Sinun tulevaisuuttasi!'
			]);
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
