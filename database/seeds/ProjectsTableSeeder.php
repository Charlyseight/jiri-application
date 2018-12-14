<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Jiri\Project::create([
            'name' => 'La cité école vivante',
            'tags'=> 'HTML, CSS, Wordpress'
        ]);

        \Jiri\Project::create([
            'name' => 'Jiri',
            'tags'=> 'HTML, CSS, Laravel, Vue.js'
        ]);

        \Jiri\Project::create([
            'name' => 'Projet de fin d‘études',
            'tags'=> 'HTML, CSS, React'
        ]);

    }
}
