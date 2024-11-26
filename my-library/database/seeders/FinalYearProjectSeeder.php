<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FinalYearProjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 2; $i++) {
            DB::table('final_year_projects')->insert([
                'title' => $faker->sentence(5),
                'student_name' => $faker->name,
                'supervisor' => 4,
                'submission_year' => $faker->year,
                'abstract' => $faker->paragraph(3),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
