<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkalaUsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['skala_usaha' => 'Usaha Mikro',],
            ['skala_usaha' => 'Usaha Kecil',],
            ['skala_usaha' => 'Usaha Menengah',],
            ['skala_usaha' => 'Usaha Besar',],
            ['skala_usaha' => '',],                       
        ];
        DB::table('skala_usahas')->insert($data);
    }
}
