<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KRSSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswaList = DB::table('mahasiswa')->pluck('npm');
        $matkulList = DB::table('matakuliah')->pluck('kode_matakuliah');

        $data = [];

        foreach ($mahasiswaList as $npm) {
            foreach ($matkulList as $kodeMatkul) {
                $data[] = [
                    'npm' => $npm,
                    'kode_matakuliah' => $kodeMatkul,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert sekaligus per 500 baris, supaya tidak terlalu berat sekali insert
        foreach (array_chunk($data, 500) as $chunk) {
            DB::table('krs')->insert($chunk);
        }
    }
}