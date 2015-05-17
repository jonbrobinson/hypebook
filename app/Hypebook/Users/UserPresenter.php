<?php

namespace Hypebook\Users;

use Laracasts\Presenter\Presenter;

/**
 * Class UserPresenter
 */
class UserPresenter extends Presenter {

    /**
     * Present a link to the user's gravatar
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}";
    }

    /**
     *
     */
    public  function followerCount()
    {
        $count = $this->entity->followers()->count();
        $plural = str_plural('Follower', $count);

        return  "{$count} {$plural}";
    }

    /**
     *
     */
    public  function statusesCount()
    {
        $count = $this->entity->statuses()->count();
        $plural = str_plural('Status', $count);

        return  "{$count} {$plural}";
    }

}