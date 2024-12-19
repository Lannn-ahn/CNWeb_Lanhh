<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1,10),
                'reporter_by' => $faker->name,
                'reporter_date' => $faker->dateTimeBetween( '-1 month','now'),
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['Low','Medium','High']),
                'status' =>$faker->randomElement(['Open','In Process','Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
