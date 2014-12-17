<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use App\Models\Admin;
use Faker\Factory as Faker;

class AdminsTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('enlamadre'),
        ]);
    }

}
