<?php
/**
 * Created by PhpStorm.
 * User: Jonbrobinson
 * Date: 5/18/15
 * Time: 11:23 PM
 */

namespace Hypebook\Handlers;


use Hypebook\Mailers\UserMailer;
use Hypebook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener {
    /**
     * @var UserMailer
     */
    private $mailer;

    /**
     * @param UserMailer $mailer
     */
    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }


    /**
     * @param UserRegistered $event
     */
    public function whenUserHasRegistered(UserRegistered $event)
    {
        $this->mailer->sendWelcomeMessageTo($event->user);
    }
}