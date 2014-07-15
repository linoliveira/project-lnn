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

Route::get('/register', array('as' => 'register', 'uses' => 'AuthController@getRegister'));
Route::post('register', array('uses' => 'AuthController@postRegister'));