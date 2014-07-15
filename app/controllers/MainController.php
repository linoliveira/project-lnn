<?php
/**
 * Created by PhpStorm.
 * User: Lino
 * Date: 15-07-2014
 * Time: 16:43
 */

class MainController extends BaseController{
public function getIndex()
{
	$user = User::find(Auth::user()->getAuthIdentifier());

	return View::make('main')->with('user', $user->getAttribute('email'));
}
} 