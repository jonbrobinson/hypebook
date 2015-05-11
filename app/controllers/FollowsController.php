<?php

use Hypebook\Users\FollowUserCommand;
use Laracasts\Flash\Flash;

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
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
