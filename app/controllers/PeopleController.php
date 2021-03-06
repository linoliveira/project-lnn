<?php

class PeopleController extends \BaseController
{
	protected $person;

	public function __construct (Person $person)
	{
		$this->person = $person;

		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 * GET /people
	 *
	 * @return Response
	 */
	public function index ()
	{
		$people = $this->person->all();
		$admin = Auth::user()->hasRole('Admin');

		return View::make('people.index', compact('people', $admin ? 'admin' : ''));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /people/create
	 *
	 * @return Response
	 */
	public function create ()
	{
		if(!Auth::user()->can("can_create"))
		{
			return Redirect::route('people.index');
		}

		return View::make('people.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /people
	 *
	 * @return Response
	 */
	public function store ()
	{
		if(!Auth::user()->can("can_create"))
		{
			return Redirect::route('people.index');
		}

		$input = Input::all();

		$validator = Validator::make($input, Person::$rules);

		if ( $validator->passes() )
		{
			$this->person->create($input);

			return Redirect::route('people.index');
		}

		return Redirect::route('people.create')
			->withInput()
			->withErrors($validator);
	}

	/**
	 * Display the specified resource.
	 * GET /people/{id}
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show ($id)
	{
		if(!Auth::user()->can("can_read"))
		{
			return Redirect::route('people.index');
		}

		$person = $this->person->findOrFail($id);

		return View::make('people.show', compact('person'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /people/{id}/edit
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit ($id)
	{
		if(!Auth::user()->can("can_update"))
		{
			return Redirect::route('people.index');
		}

		$person = $this->person->find($id);

		if ( is_null($person) )
		{
			return Redirect::route('people.index');
		}

		return View::make('people.edit', compact('person'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /people/{id}
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update ($id)
	{
		if(!Auth::user()->can("can_update"))
		{
			return Redirect::route('people.index');
		}

		$input = array_except(Input::all(), '_method');
		$validator = Validator::make($input, Person::$rules);

		if ( $validator->passes() )
		{
			$person = $this->person->find($id);
			$person->update($input);

			return Redirect::route('people.show', $id);
		}

		return Redirect::route('people.edit', $id)
			->withInput()
			->withErrors($validator);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /people/{id}
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy ($id)
	{
		if(!Auth::user()->can("can_delete"))
		{
			return Redirect::route('people.index');
		}

		$this->person->find($id)->delete();

		return Redirect::route('people.index');
	}
}