<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IT_hardware_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 
        foreach (range(1, 100) as $index) { 
            DB::table('it_centers')->insert([
                'name' => $faker->name,
                'location' => $faker->address(),
                'contact_email' => $faker->email, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $faker = Faker::create();
        foreach (range(1, 100) as $index) { 
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->text(50),
                'type' => $faker->word(),
                'status' => $faker->boolean(50),
                'center_id' => $faker->randomNumber(1,100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    } 
}