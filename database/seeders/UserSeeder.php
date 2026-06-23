<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Akun admin
        User::create([
            ['name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'admin'],

            ['name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'mahasiswa'],

            ['name' => 'Robi Septiandi',
            'email' => 'rose@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'mahasiswa'],
        ]);


        $mahasiswaList = DB::table('mahasiswa')->get();

        foreach ($mahasiswaList as $mhs) {
            User::create([
                'name' => $mhs->nama,
                'email' => $mhs->npm,
                'password' => bcrypt('12345'),
                'role' => 'mahasiswa',
                'npm' => $mhs->npm,
            ]);
        }
    }
}