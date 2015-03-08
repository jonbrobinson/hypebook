<?php
/**
 * Created by PhpStorm.
 * User: Jonbrobinson
 * Date: 3/1/15
 * Time: 4:49 PM
 */

namespace Hypebook\Registration;


class RegisterUserCommand {

    public $username;

    public $email;

    public $password;

    function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }


}