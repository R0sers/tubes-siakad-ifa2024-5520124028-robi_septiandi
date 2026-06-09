<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use faker\Factory as Faker;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('dosen')->insert([
                'nidn' => $faker->unique()->numberBetween(210903, 210912),
                'nama' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
