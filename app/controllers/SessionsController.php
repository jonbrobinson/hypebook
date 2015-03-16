<?php

use Hypebook\Forms\SignInForm;
use Laracasts\Flash\Flash;

class SessionsController extends \BaseController {

	/**
	 * @var SignInForm
	 */
	private $signInForm;

	function __construct(SignInForm $signInForm)
	{
		$this->signInForm = $signInForm;

		$this->beforeFilter('guest', ['except' => 'destroy']);
	}

	/**
	 * Show the form for signing in.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$formData = Input::only('email', 'password');

		$this->signInForm->validate($formData);

		if (Auth::attempt($formData)) {
			Flash::message('Welcome Back!');

			return Redirect::intended('statuses');
		}
	}

	public function destroy()
	{
		Auth::logout();

		Flash::message('You have now been logged out');
		return Redirect::home();
	}

}
