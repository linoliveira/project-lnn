<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', array('as' => 'main', 'uses' => 'MainController@getIndex'))->before('auth');

Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@getLogin'))->before('guest');
Route::post('login', array('uses' => 'AuthController@postLogin'))->before('csrf');

Route::get('/logout', array('uses' => 'AuthController@getLogout'));

Route::get('/register', array('as' => 'register', 'uses' => 'AuthController@getRegister'))->before('guest');
Route::post('register', array('uses' => 'AuthController@postRegister'))->before('csrf');

Route::resource('people', 'PeopleController');

Route::get('/users', array('as' => 'users', 'uses' => 'ManageUsersController@getUsers'))->before('auth');
Route::post('/users', array('uses' => 'ManageUsersController@postUsers'))->before('csrf');

//Route::get('/perm', function(){dd(Auth::user()->can('update'));});
//Route::get('/perm', function(){dd('User'.User::where('email','=',Auth::user()->email)->first()->id);});

/*Route::get('/start', function()
{
	$admin = new Role();
	$admin->name = 'Admin';
	$admin->save();

	$user_1 = new Role();
	$user_1->name = 'User1';
	$user_1->save();

	$user_2 = new Role();
	$user_2->name = 'User2';
	$user_2->save();

	$create = new Permission();
	$create->name = 'can_create';
	$create->display_name = 'Can Create People';
	$create->save();

	$read = new Permission();
	$read->name = 'can_read';
	$read->display_name = 'Can Read People';
	$read->save();

	$update = new Permission();
	$update->name = 'can_update';
	$update->display_name = 'Can Update People';
	$update->save();

	$delete = new Permission();
	$delete->name = 'can_delete';
	$delete->display_name = 'Can Delete People';
	$delete->save();

	$admin->attachPermission($create);
	$admin->attachPermission($read);
	$admin->attachPermission($update);
	$admin->attachPermission($delete);
	$user_1->attachPermission($read);
	$user_1->attachPermission($update);
	$user_2->attachPermission($read);
	$user_2->attachPermission($update);

	$user1 = User::find(1);
	$user2 = User::find(2);
	$user3 = User::find(3);

	$user1->attachRole($admin);
	$user2->attachRole($user_1);
	$user3->attachRole($user_2);

	return 'Woohoo!';
});*/