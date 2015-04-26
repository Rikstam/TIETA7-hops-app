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
		$rules = [];

		//autumn study module validations
		foreach($this->request->get('autumn_module_names') as $key => $val)
		{
			$rules['autumn_module_names.'.$key] = 'required';
		}

		foreach($this->request->get('autumn_credits') as $key => $val)
		{
			$rules['autumn_credits.'.$key] = 'required|numeric';
		}

		foreach($this->request->get('autumn_subjects') as $key => $val)
		{
			$rules['autumn_subjects.'.$key] = 'required';
		}


		//spring study module validations
		foreach($this->request->get('spring_module_names') as $key => $val)
		{
			$rules['spring_module_names.'.$key] = 'required';
		}

		foreach($this->request->get('spring_credits') as $key => $val)
		{
			$rules['spring_credits.'.$key] = 'required|numeric';
		}

		foreach($this->request->get('spring_subjects') as $key => $val)
		{
			$rules['spring_subjects.'.$key] = 'required';
		}

		return $rules;
	}

	public function messages()
  {
    $messages = [];

		//$messages['interest_in_own_field.required'] = 'Oman alan kiinnostus on pakollinen tieto';

		foreach($this->request->get('autumn_module_names') as $key => $val)
    {
      $messages['autumn_module_names.'.$key.'.required'] = 'Syyslukukauden opintojakson nimi on pakollinen tieto.' ;
    }

		foreach($this->request->get('autumn_credits') as $key => $val)
		{
			$messages['autumn_credits.'.$key.'.required'] = 'Syyslukukauden opintojakson opintopisteet on pakollinen tieto.' ;

		}

		foreach($this->request->get('autumn_subjects') as $key => $val)
		{
			$messages['autumn_subjects.'.$key.'.required'] = 'Syyslukukauden opintojakson oppiaine on pakollinen tieto.' ;

		}


		foreach($this->request->get('spring_module_names') as $key => $val)
    {
      $messages['spring_module_names.'.$key.'.required'] = 'Kevätlukukauden opintojakson nimi on pakollinen tieto.' ;
    }

		foreach($this->request->get('spring_credits') as $key => $val)
		{
			$messages['spring_credits.'.$key.'.required'] = 'Kevätlukukauden opintojakson opintopisteet on pakollinen tieto.' ;

		}

		foreach($this->request->get('spring_subjects') as $key => $val)
		{
			$messages['spring_subjects.'.$key.'.required'] = 'Kevätlukukauden opintojakson oppiaine on pakollinen tieto.' ;

		}



		return $messages;
  }

}
