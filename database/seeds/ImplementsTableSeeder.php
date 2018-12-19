<?php

use Illuminate\Database\Seeder;

class ImplementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Jiri\Implement::create([
            'student_id' => 1,
            'project_id'=> 1,
            'jiri_id' => 1,
            'result' => 12,
        ]);

        \Jiri\Implement::create([
            'student_id' => 1,
            'project_id'=> 2,
            'jiri_id' => 1,
            'result' => 12,
        ]);

        \Jiri\Implement::create([
            'student_id' => 2,
            'project_id'=> 2,
            'jiri_id' => 1,
            'result' => 14,
        ]);

        \Jiri\Implement::create([
            'student_id' => 3,
            'project_id'=> 3,
            'jiri_id' => 2,
            'result' => 10,
        ]);


    }
}
