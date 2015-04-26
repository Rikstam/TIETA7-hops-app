<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateStudyPlanRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'interest_in_own_field' => 'required'
		];

		//foreach($this->request->get)
	}

}
