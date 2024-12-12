<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker; 
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('classes')->insert([
                'grade_level' => $faker->randomElement(['Pre-K', 'Kindergarten']),
                'room_number' => 'VH' . $faker->numberBetween(1,20), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
