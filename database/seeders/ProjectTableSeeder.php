<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 5; $i++) {
            $newProject = new Project();

            $newProject->title = $faker->sentence(3);
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->description = $faker->paragraphs(3, true);
            $newProject->short_description = $faker->text(50);
            $newProject->url_repo = $faker->url();
            $newProject->type_id = rand(1, 2);

            $newProject->save();
        }
    }
}
