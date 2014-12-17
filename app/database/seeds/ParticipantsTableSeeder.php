<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use App\Models\Participant;
use Faker\Factory as Faker;

class ParticipantsTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $index)
        {
            Participant::create([
                'name'  => $faker->name,
                'photo' => 'participant.jpg',
            ]);
        }
    }

}
