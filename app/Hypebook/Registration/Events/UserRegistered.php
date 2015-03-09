<?php

namespace Hypebook\Registration\Events;

use Hypebook\Users\User;

class UserRegistered {

    public  $user;

    /**
     * @param User $user
     */
    function __construct(User $user)
    {
        $this->user = $user;
    }


}