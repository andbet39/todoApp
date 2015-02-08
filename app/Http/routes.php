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

Route::get('todoapp','TodoAppController@index');


Route::resource('api/todos','TodosController');


Route::get('home', 'HomeController@index');

Route::get('event/create', 'EventsController@create');
Route::post('event/addPicture', 'EventsController@addPicture');
Route::get('event', 'EventsController@index');
Route::get('event/get/{filename}', [
		'as' => 'picture', 'uses' => 'EventsController@get']);

	Route::get('fileentry', 'FileEntryController@index');
	Route::get('fileentry/get/{filename}', [
			'as' => 'getentry', 'uses' => 'FileEntryController@get']);
	Route::post('fileentry/add', [ 
		    'as' => 'addentry', 'uses' => 'FileEntryController@add']);



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


