<?php

class RegistrationController extends \BaseController
{

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
     * @return string
     */
    public function store()
    {
        return Redirect::home();
    }
}
