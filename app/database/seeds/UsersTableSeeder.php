<?php


use Faker\Factory as Faker;
use Hypebook\Users\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();


        foreach(range(1, 50) as $index)
        {
            User::create([
                'username' => $faker->word . $index,
                'email' => $faker->email,
                'password' => "secret",
            ]);
        }
    }

}