<?php

use Hypebook\Forms\RegistrationForm;

class RegistrationController extends \BaseController
{
    private $registrationForm;

    /**
     * @param RegistrationForm $registrationForm
     */
    function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
    }
    /**
     * Show a form to register a user.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('registration.create');
    }


    /**
     * Create a new hypebook user
     *
     * @return string
     */
    public function store()
    {
        $this->registrationForm->validate(Input::all());

        $user = User::create(
            Input::only('username', 'email', 'password')
        );

        Auth::login($user);

        return Redirect::home();

    }
}
