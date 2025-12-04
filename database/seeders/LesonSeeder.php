<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LesonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lesons')->insert([
            "leson" => "Основы алгоритмизации и программирования"
        ]);

        DB::table('lesons')->insert([
            "leson" => "Основы веб-дизайна"
        ]);

        DB::table('lesons')->insert([
            "leson" => "Основы проектирования баз данных"
        ]);
    }
}
