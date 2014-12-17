<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use App\Models\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index)
        {
            $username = $faker->userName;

            User::create([
                'username' => $username,
                'name'     => $faker->name,
                'photo'    => Str::slug($username) . '.jpg',
            ]);
        }
    }

}
