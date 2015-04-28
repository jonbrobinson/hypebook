<?php


use Faker\Factory as Faker;
use Hypebook\Users\User;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();


        foreach(range(1, 50) as $index)
        {
            User::create([
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => "secret"
            ]);
        }
    }

}