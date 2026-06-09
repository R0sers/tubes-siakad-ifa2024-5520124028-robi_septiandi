<?php

namespace Database\Seeders;

use App\models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $userData = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('12345'),
                'role'=>'admin'
            ],
            [
                'name'=>'Mahasiswa',
                'email'=>'Mahasiswa@gmail.com',
                'password'=>bcrypt('12345'),
                'role'=>'mahasiswa'
            ],
            [
                'name'=>'Robi Septiandi',
                'email'=>'robis@gmail.com',
                'password'=>bcrypt('12345'),
                'role'=>'mahasiswa'
            ]
        ];
        foreach($userData as $key => $val){
            User::create($val);
        }    

    }
}
