<?php


class AuthController extends Controller
{
	public function getLogin ()
	{
		$js = Session::get('js');
		return is_null($js) ? View::make('auth') : View::make('auth')->with('js', $js);
	}

	public function postLogin ()
	{
		$rules = array (
			'email' => 'required',
			'password' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ( $validator->fails() )
		{
			return Redirect::route('login')->withErrors($validator);
		}

		$auth = Auth::attempt(array (
			'email' => Input::get('email'),
			'password' => Input::get('password')
		), false);

		if ( !$auth )
		{
			return Redirect::route('login')->withErrors(array (
				'Invalid user credentials'
			));
		}

		return Redirect::route('people.index');
	}

	public function getLogout ()
	{
		if ( Auth::check() )
		{
			Auth::logout();
		}

		return Redirect::route('login');
	}

	public function getRegister ()
	{
		return View::make('register');
	}

	public function postRegister ()
	{
		$data = Input::all();
		$rules = array (
			'email' => 'required|email|unique:user',
			'password' => 'required|confirmed|min:5',
		);
		$validator = Validator::make($data, $rules);

		if ( $validator->fails() )
		{
			return Redirect::route('register')->withErrors($validator);
		}

		$user = new User;
		$user->email = $data['email'];
		$user->password = Hash::make($data['password']);
		$user->save();

		$role = new Role();
		$role->name = 'User'.User::where('email','=',$user->email)->first()->id;
		$role->save();
		$role->perms()->attach(1);  // permission to create
		$role->perms()->attach(2);  // permission to read

		$user->attachRole($role);

		$message = "<script>alert('Registration successful! Please Login.')</script>";

		return Redirect::route('login')->with('js', $message);
	}
}