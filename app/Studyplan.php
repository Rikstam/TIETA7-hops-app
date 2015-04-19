<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Studyplan extends Model {


	protected $table = 'study_plans';

	protected $fillable = [
		'positive_feedback',
		'negative_feedback',
		'academic_year',
		'has_job',
		'job_description' ,
		'job_type',
		'job_hours',
		'job_explanation',
		'interest_in_own_field',
		'optional_interest'

		];


	public function student()
	{
	return $this->belongsTo('App\User');
	}

	public function studyModules()
	{
			return $this->hasMany('\App\Studymodule');
	}

}
