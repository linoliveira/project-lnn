<?php


class ManageUsersController extends Controller
{
	public function getUsers ()
	{
		if(!Auth::user()->hasRole('Admin'))
		{
			return Redirect::route('people.index');
		}

		$js = Session::get('js');
		return is_null($js)
			? View::make('users')->with('data', array ('users' => User::all()))
			: View::make('users')->with('data', array (
				'users' => User::all(),
				'js' => $js
			));
	}

	public function postUsers ()
	{
		if(!Auth::user()->hasRole('Admin'))
		{
			return Redirect::route('people.index');
		}

		$input = Input::all();
		$user = User::find($input['id']);
		$perms = $user->roles()->first()->perms();

		$changed = false;
		$changed = $this->checkAndSetPermissions($user->can('can_create'), isset($input['create']), 1, $perms) || $changed;
		$changed = $this->checkAndSetPermissions($user->can('can_read'), isset($input['read']), 2, $perms) || $changed;
		$changed = $this->checkAndSetPermissions($user->can('can_update'), isset($input['update']), 3, $perms) || $changed;
		$changed = $this->checkAndSetPermissions($user->can('can_delete'), isset($input['delete']), 4, $perms) || $changed;

		$message = "<script>alert('" . ($changed ? 'Permissions saved!' : 'No changes to apply.') . "')</script>";

		return Redirect::route('users')->with('js', $message);
	}

	private function checkAndSetPermissions ($user_perm, $input_perm, $perm_id, $perms)
	{
		if ( $user_perm != $input_perm )
		{
			$user_perm ? $perms->detach($perm_id) : $perms->attach($perm_id);
			return true;
		}

		return false;
	}
}