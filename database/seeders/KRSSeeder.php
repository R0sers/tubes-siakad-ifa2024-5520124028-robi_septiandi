<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use faker\Factory as Faker;

class KRSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('krs')->insert([
                'npm' => '5520124' . str_pad($faker->numberBetween(0,99), 3, '0', STR_PAD_LEFT),
                'kode_matakuliah' => 'MK' . str_pad($faker->numberBetween(1,7), 3, '0', STR_PAD_LEFT),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
