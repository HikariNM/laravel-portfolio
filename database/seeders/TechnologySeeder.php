<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = ['HTML', 'CSS', 'JS', 'PHP', 'Laravel', 'Vue', 'Vite'];

        foreach ($technologies as $technology) {
            $newTech = new Technology();
            $newTech->name = $technology;
            $newTech->description = $faker->sentence();
            $newTech->color = $faker->hexColor();

            $newTech->save();
        }
    }
}
