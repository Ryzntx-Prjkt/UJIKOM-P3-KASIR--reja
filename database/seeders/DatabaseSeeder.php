<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'no_telp' => '08156182739',
                'role' => 'admin'
            ],
            [
                'name' => 'Manajer',
                'username' => 'manajer',
                'email' => 'manajer@gmail.com',
                'password' => Hash::make('12345678'),
                'no_telp' => '08156182739',
                'role' => 'manajer'
            ],
            [
                'name' => 'Kasir',
                'username' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => Hash::make('12345678'),
                'no_telp' => '08156182739',
                'role' => 'kasir'
            ]
        ];

        foreach($user as $item => $value){
            User::create($value);
        }
    }
}
