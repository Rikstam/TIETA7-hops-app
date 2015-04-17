<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Studyplan extends Model {


	protected $table = 'study_plans';

	public function student()
	{
	return $this->belongsTo('App\User');
	}

}
