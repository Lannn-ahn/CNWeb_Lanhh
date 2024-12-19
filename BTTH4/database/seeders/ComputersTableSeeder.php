<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // Thêm dữ liệu cho bảng medicines
        foreach (range(1, 50) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->bothify('Lab##-PC##'),

                'model' => $faker->randomElement(['dell','hp','asus']),
                'operating_system' => $faker->randomElement([
                    'macOS',
                    'Window',
                    'Linux'
                ]),
                'processor' => $faker->randomElement([
                    'i5',
                    'i3',
                    'i7'
                ]),
                'memory' => $faker->randomElement([8, 16, 32]),
                'available' => $faker->boolean(70),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
