<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        $nidnList = DB::table('dosen')->pluck('nidn')->toArray();

        for ($i = 0; $i < 100; $i++) {
            DB::table('mahasiswa')->insert([
                'npm' => '5520124' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nidn' => $faker->randomElement($nidnList),
                'nama' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}