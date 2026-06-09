<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use faker\Factory as Faker;

class MatakuliahSeeder extends Seeder
{
 
    public function run(): void
    {

    $matkul = [
        "IT Governance",
        "Jaringan Komputer",
        "Interaksi Manusia dan Komputer",
        "Rekayasa Perangkat Lunak",
        "Komunikasi Data",
        "Pemrograman Web II",
        "Multimedia",
        "Basis Data II",
    ];  
        $faker = Faker::create();

        for ($i = 1; $i <=7; $i++) {
            DB::table('matakuliah')->insert([
                'kode_matakuliah' => 'MK' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_matakuliah' => $matkul[$i],
                'sks' => $faker->numberBetween(2, 4),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
