<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Carbon\Carbon;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['firstName', 'lastName', 'telephone', 'address', 'studentNumber' , 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token','role'];


	public function currentStudyYear()
	{
		$now = Carbon::now();
		$startingYear = new Carbon($this->attributes['created_at']);

		if ($startingYear->diffInMonths($now ) <= 12){
			return 1;
		}

		else if ($startingYear->diffInMonths($now ) > 12 && $startingYear->diffInMonths($now ) <= 24){
			return 2;
		}
		else if ($startingYear->diffInMonths($now ) > 24 && $startingYear->diffInMonths($now ) ){
			return 3;
		}

		//return $startingYear->diffInMonths($now );
		//return Carbon::parse($startingYear)->format('Y');
	}

	public function studyplans(){
		return $this->hasMany('App\Studyplan');
	}

	public function tutored_students(){
		return $this->hasMany('App\User','tutor_id');
	}


	public function scopeStudents($query){
		$query->where('role', '=', 'student')->get();
	}

	public function scopeTeachertutors($query){
		$query->where('role', '=', 'teacher-tutor')->get();
	}

	public function isAStudent()
	{
		if ($this->role == 'student') {
			return true;
		}
	}

	public function isATeacherTutor()
	{
		if ($this->role == 'teacher-tutor') {
			return true;
		}
	}

	public function isAMasterTutor()
	{
		if ($this->role == 'master-tutor') {
			return true;
		}
	}

}
