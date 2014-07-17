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
	return Redirect::route('people.index');
}
} 