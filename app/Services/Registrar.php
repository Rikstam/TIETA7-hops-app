<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'firstName' => 'required|max:255',
			'lastName' 	=> 'required|max:255',
			'telephone' => 'required|max:255',
			'studentNumber' => 'required|integer|unique:users',


			'email' 		=> 'required|email|max:255|unique:users',
			'address' 	=> 'required|max:255',

			'password' 	=> 'required|confirmed|min:6',

		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'firstName' => $data['firstName'],
			'lastName' => $data['lastName'],
			'telephone' => $data['telephone'],
			'address' => $data['address'],
			'studentNumber' => $data['studentNumber'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}
