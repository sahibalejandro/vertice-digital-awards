<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use App\Models\Category;
use App\Models\User;
use App\Models\Vote;
use Faker\Factory as Faker;

class VotesTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        $users = User::lists('id');
        $categories = Category::lists('id');

        foreach ($users as $userId)
        {
            foreach ($categories as $categoryId)
            {
                Vote::create([
                    'user_id'       => $userId,
                    'voted_user_id' => $faker->randomElement($users),
                    'category_id'   => $categoryId,
                ]);
            }
        }
    }

}
