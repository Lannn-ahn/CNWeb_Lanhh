<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; // Thêm dòng này để nhập Faker
use Illuminate\Support\Facades\DB; // Thêm dòng này để dùng DB facade

class IssuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Sử dụng Faker
        $computers_id = DB::table('computers')->pluck('id')->toArray(); 

        foreach (range(1, 101) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computers_id), 
                'reported_by' => $faker->optional()->name, 
                'reported_date' => $faker->dateTime(),
                'description' => $faker->sentence(5),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
