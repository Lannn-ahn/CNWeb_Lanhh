<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker; 
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cls_id = DB::table('classes')->pluck('id')->toArray(); 

        foreach (range(1, 100) as $index) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName(), 
                'last_name' => $faker->lastName(), 
                'date_of_birth' => $faker->date(), 
                'parent_phone' => $faker->phoneNumber(),
                'class_id' => $faker->randomElement($cls_id),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
