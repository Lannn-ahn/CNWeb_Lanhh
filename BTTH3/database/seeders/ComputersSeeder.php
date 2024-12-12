<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker; 
use Illuminate\Support\Facades\DB;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 101) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word . 'PC', 
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre M720']), 
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Macbook AirPro', 'Windows 11']), 
                'processor' => $faker->randomElement(['Intel Core i5-11400 10 Pro', 'Intel Core i7-11400 11 Pro']), 
                'memory' => $faker->randomElement([8, 16, 32]) ,
                'available' => $faker->boolean, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
