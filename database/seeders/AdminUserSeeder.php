<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'login' => 'Admin',
            'password' => Hash::make('KorokNET'),
            'fio' => 'Андрей Т. С.',
            'phone' => '+7(777)777-77-77',
            'email' => 'korki@gmail.com',
            'is_admin' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
