<?php

use Hypebook\Forms\RegistrationForm;
use Hypebook\Registration\RegisterUserCommand;
use Hypebook\Core\CommandBus;
use Laracasts\Flash\Flash;

class RegistrationController extends BaseController
{
    use  CommandBus;

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

        extract(Input::only('username', 'email', 'password'));

        $command = new RegisterUserCommand($username, $email, $password);

        $user = $this->execute($command);

        Auth::login($user);

        Flash::overlay("Glad to have you as a new Hypebook member!");

        return Redirect::home();

    }
}
