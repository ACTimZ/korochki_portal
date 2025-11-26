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
            'login'      => 'Admin',
            'password'   => Hash::make('KorokNET'),
            'fio'        => 'Администратор Портала',
            'phone'      => '80000000000',
            'email'      => 'admin@site.local',
            'is_admin'   => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
