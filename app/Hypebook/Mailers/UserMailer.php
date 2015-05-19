<?php
/**
 * Created by PhpStorm.
 * User: Jonbrobinson
 * Date: 5/18/15
 * Time: 11:38 PM
 */

namespace Hypebook\Mailers;


use Hypebook\Users\User;

class UserMailer extends Mailer {

    /**
     * @param User $user
     */
    public function sendWelcomeMessageTo(User $user)
    {
        $subject = "Welcome to Hypebook";

        $view = "emails.registration.confirm";

        return $this->sendTo($user, $subject, $view);
    }
}