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
}
