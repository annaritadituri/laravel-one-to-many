<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        DB::table('projects')->truncate();
        for($i = 0; $i < 10; $i++) {

            $project = new Project();
            
            $project->title = $faker->words(3, true);
            $project->description = $faker->paragraph(2);
            $project->start_date = $faker->dateTimeThisYear();
            $project->in_progress = $faker->boolean();
            $project->slug = Str::of($project->title)->slug();

            $project->save();

        }

    }
}
