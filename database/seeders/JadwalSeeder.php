<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use faker\Factory as Faker;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('jadwal')->insert([
                'kode_matakuliah' => 'MK' . str_pad($faker->numberBetween(1,7), 3, '0', STR_PAD_LEFT),
                'nidn' => $faker->numberBetween(210903, 210912),
                'hari' => $faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']),
                'kelas' => $faker->randomElement(['A', 'B', 'C' , 'D' , 'E']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
