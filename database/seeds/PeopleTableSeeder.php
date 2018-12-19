<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Jiri\People::create([
            'jiri_id' => 1,
            'person_id' => 1,
            'person_type' => \Jiri\User::class
        ]);

        \Jiri\People::create([
            'jiri_id' => 1,
            'person_id' => 1,
            'person_type' => \Jiri\Student::class
        ]);
        \Jiri\People::create([
            'jiri_id' => 2,
            'person_id' => 2,
            'person_type' => \Jiri\User::class
        ]);
        \Jiri\People::create([
            'jiri_id' => 1,
            'person_id' => 2,
            'person_type' => \Jiri\Student::class
        ]);
    }
}
