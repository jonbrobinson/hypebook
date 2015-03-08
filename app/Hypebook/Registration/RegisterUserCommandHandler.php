<?php


namespace Hypebook\Registration;

use Laracasts\Commander\CommandHandler;
use Hypebook\Users\UserRepository;
use Hypebook\Users\User;

class RegisterUserCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = User::register(
            $command->username, $command->email, $command->password
        );

        $this->repository->save($user);

        return $user;
    }
}