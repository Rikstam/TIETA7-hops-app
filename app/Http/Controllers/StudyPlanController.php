<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StudyPlanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$numberOfAutumnInputs = 5;
		$numberOfSpringInputs = 5;


		$creditsAmounts = [
			1 => 1,
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5,
			6 => 6,
			7 => 7,
			8 => 8,
			9 => 9,
			10 => 10
		];

		$subjects = [
			'Tietojenkäsittelytieteiden tutkinto-ohjelma' => 'Tietojenkäsittelytieteiden tutkinto-ohjelma',
			'Bioteknologian tutkinto-ohjelma' => 'Bioteknologian tutkinto-ohjelma',
			'Matematiikan ja tilastotieteen tutkinto-ohjelma' =>'Matematiikan ja tilastotieteen tutkinto-ohjelma',
			'Informaatiotutkimuksen ja interaktiivisen median tutkinto-ohjelma'=>'Informaatiotutkimuksen ja interaktiivisen median tutkinto-ohjelma'
			];
		return view('studyplans.create', compact('subjects', 'creditsAmounts', 'numberOfAutumnInputs', 'numberOfSpringInputs' ));
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

}
