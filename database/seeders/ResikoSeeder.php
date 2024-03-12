<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResikoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['resiko' => 'Menengah Tinggi',],
            ['resiko' => 'Menengah Rendah',],
            ['resiko' => 'Rendah',],
            ['resiko' => 'Tinggi',],            
        ];
        DB::table('resikos')->insert($data);
    }
}
