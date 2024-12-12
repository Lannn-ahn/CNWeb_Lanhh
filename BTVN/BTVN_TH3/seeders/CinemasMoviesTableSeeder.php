<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CinemasMoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) { 
                    DB::table('cinemas')->insert([
                   'name'=> $faker->sentence(4),
                   'location'=> $faker->address,
                   'total_seats'=> $faker->numberBetween(20,100),
                   'created_at' => now(),
                   'updated_at' => now(),

        ]);

    //
        $faker = Faker::create();
        foreach (range(1, 100) as $index) { 
            DB::table('movies')->insert([
              
                'title' => $faker->sentence(3),
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->numberBetween(90, 180),  
                'cinema_id' => $faker->numberBetween(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
                ]);


            }
 
        }

    }
}

