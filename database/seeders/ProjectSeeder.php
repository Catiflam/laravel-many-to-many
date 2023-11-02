<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type_ids = Type::all()->pluck("id");
        $type_ids[] = null;

        $tecnology_ids = Technology::all()->pluck("id");

        for($i = 0; $i < 100; $i++){
            $project = new Project();
            $project->type_id = $faker->randomElement($type_ids);
            $project->title = $faker->catchPhrase();
            $project->content = $faker->paragraphs(3, true);
            $project->slug = Str::slug($project->title);
            $project->save();

            $project->technologies()->attach($faker->randomElements( $tecnology_ids, rand(0,2)));

    }
}
}