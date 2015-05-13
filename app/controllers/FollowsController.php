<?php

use Hypebook\Users\FollowUserCommand;
use Hypebook\Users\UnfollowUserCommand;
use Laracasts\Flash\Flash;

/**
 * Class FollowsController
 */
class FollowsController extends \BaseController {

    /**
	 * Follow a User
     *
	 * @return Response
	 */
	public function store()
	{
        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->execute(FollowUserCommand::class, $input);

        Flash::success('You are now following this user.');

        return Redirect::back();
	}


    /**
     * UnFollow a User
     *
     * @param $userIdToUnfollow
     * @return Response
     * @internal param int $id
     */
    public function destroy($userIdToUnfollow)
    {
        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->execute(UnfollowUserCommand::class, $input);

        Flash::success('You have now unfollowed this user.');

        return Redirect::back();
    }


}
