<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Jiri\Student::create([
            'name' => 'Gilles Delmotte',
            'email' => 'gilles.delmotte@hotmail.com',
        ]);
        \Jiri\Student::create([
            'name' => 'Marvin Lemarchand',
            'email' => 'm.lemarchand@hotmail.com',
        ]);
        \Jiri\Student::create([
            'name' => 'Cédric Muller',
            'email' => 'ced.muller@hotmail.com',
        ]);
        \Jiri\Student::create([
            'name' => 'Charlotte Toussaint',
            'email' => 'charlotte_toussaint@hotmail.com',
        ]);

    }

}
