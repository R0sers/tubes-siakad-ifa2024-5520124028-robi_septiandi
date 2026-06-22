<?php

namespace Database\Seeders;

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

        $nidnList = DB::table('dosen')->pluck('nidn')->toArray();
        $kodeMKList = DB::table('matakuliah')->pluck('kode_matakuliah')->toArray();


        for ($i = 0; $i < 20; $i++) {
            DB::table('jadwal')->insert([
                'kode_matakuliah' => $faker->randomElement($kodeMKList),
                'nidn' => $faker->randomElement($nidnList),
                'hari' => fake()->randomElement([
                    'Senin',
                    'Selasa',
                    'Rabu',
                    'Kamis',
                    'Jumat'
                ]),
                'jam' => fake()->randomElement([
                    '08.00-10.30',
                    '10.30-13.00',
                    '13.00-15.30'
                ]),
                'kelas' => fake()->randomElement([
                    'A',
                    'B',
                    'C',
                    'D',
                    'E'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}