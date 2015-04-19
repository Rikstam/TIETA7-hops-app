<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Studymodule extends Model {

	protected $table = 'study_modules';

	protected $fillable = [
		'module_name',
		'credits',
		'subject',
		'semester_name',
		'semester_year'
	];

	public function studyplan()
	{
		return $this->belongsTo('App\Studyplan');
	}

}
