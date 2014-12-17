<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use App\Models\Category;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index)
        {
            $name = $faker->word;

            Category::create([
                'name'  => $name,
                'image' => Str::slug($name) . '-category.jpg',
            ]);
        }
    }

}
