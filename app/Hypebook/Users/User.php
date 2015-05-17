<?php

namespace Hypebook\Users;

use Hypebook\Registration\Events\UserRegistered;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
use Eloquent, Hash;
use Laracasts\Presenter\PresentableTrait;


class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

	/**
	 * Which fields may be mass assigned?
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    /**
     * Path ro the presenter for a user
     *
     * @var string
     */
    protected $presenter = 'Hypebook\Users\UserPresenter';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Passwords must always be hashed.
	 *
	 * @param $password
     */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	 * A user has many statutes
	 *
	 * @return mixed
     */
	public function statuses()
	{
		return $this->hasMany('Hypebook\Statuses\Status');
	}

	/**
	 * Register a new user
	 *
	 * @param $username
	 * @param $email
	 * @param $password
	 * @return static
	 */
	public static function register($username, $email, $password)
	{
		$user = new static (compact('username', 'email', 'password'));

		$user->raise(new UserRegistered($user));

		return $user;
	}

    /**
     * Determine if the given user is the same
     * as the current one
     *
     * @param $user
     * @return bool
     */
    public function is($user)
    {
        if (is_null($user)) return false;

        return $this->username == $user->username;
    }


    /**
     * Get the list of users the the current user follows
     *
     * @return mixed
     */
    public function followedUsers()
    {
        return $this->belongsToMany(self::class, 'follows', 'follower_id', 'followed_id')
                    ->withTimestamps();
    }

    /**
     * Get the list of users the the current user is followed by
     *
     * @return mixed
     */
    public function followers()
    {
        return $this->belongsToMany(self::class, 'follows', 'followed_id', 'follower_id')
            ->withTimestamps();
    }

    /**
     * Determine if current user follows another user
     *
     * @param User $otherUser
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');

        return in_array($this->id, $idsWhoOtherUserFollows);
    }
}
