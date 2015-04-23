<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('users', 'UsersController@index');

Route::get('profile/{id}', 'UsersController@show');



Route::get('admin', 'AdminController@adminpanel');
Route::post('admin','AdminController@allocateStudents');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::resource('studyplans', 'StudyPlansController');
