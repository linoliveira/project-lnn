<?php

class Person extends \Eloquent
{
	protected $fillable = array (
		'name',
		'surname',
		'birth_date',
		'gender',
		'phone',
		'email',
		'address',
		'profession',
		'civil_status'
	);

	protected $guard = array('id', 'created_at', 'updated_at');

	public static $rules = array (
		'name' => 'required|alpha',
		'surname' => 'required|alpha',
		'birth_date' => 'required|date',
		'gender' => 'required|alpha',
		'phone' => 'required|numeric|digits_between:7,15',
		'email' => 'required|email',
		'address' => 'required',
		'profession' => 'required|alpha',
		'civil_status' => 'required|alpha'
	);
}