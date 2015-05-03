<?php

use Hypebook\Forms\RegistrationForm;
use Hypebook\Registration\RegisterUserCommand;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Flash\Flash;

class RegistrationController extends BaseController
{
    use  CommanderTrait;

    /**
     * @var RegistrationForm
     */
    private $registrationForm;

    /**
     * @param RegistrationForm $registrationForm
     */
    function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;

        $this->beforeFilter('guest');
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

        $user = $this->execute(RegisterUserCommand::class);

        Auth::login($user);

        Flash::overlay("Glad to have you as a new Hypebook member!");

        return Redirect::home();

    }
}
