<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

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
