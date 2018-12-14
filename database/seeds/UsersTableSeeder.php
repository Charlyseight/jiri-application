<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Jiri\User::create([
            'name' => 'Pascale Colling',
            'email' => 'colling_Pascale@hotmail.com',
            'password' => Hash::make('secret')
        ]);

        \Jiri\User::create([
            'name' => 'Julie Toussaint',
            'email' => 'julie-toussaint@hotmail.com',
            'password' => Hash::make('secret')
        ]);
        \Jiri\User::create([
            'name' => 'Dominique Vilain',
            'email' => 'dom.vilain@hotmail.com',
            'password' => Hash::make('secret')
        ]);
        \Jiri\User::create([
            'name' => 'Myriam Dupont',
            'email' => 'myriam.dupont@hotmail.com',
            'password' => Hash::make('secret')
        ]);
    }
}
