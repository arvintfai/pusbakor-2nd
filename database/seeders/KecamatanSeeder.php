<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kecamatan' => 'Donorojo',],
            ['kecamatan' => 'Sudimoro',],
            ['kecamatan' => 'Tegalombo',],
            ['kecamatan' => 'Pacitan',],
            ['kecamatan' => 'Punung',],
            ['kecamatan' => 'Pringkuku',],
            ['kecamatan' => 'Ngadirojo',],
            ['kecamatan' => 'Tulakan',],
            ['kecamatan' => 'Kebonagung',],
            ['kecamatan' => 'Nawangan',],
            ['kecamatan' => 'Arjosari',],
            ['kecamatan' => 'Bandar',],            
        ];

        DB::table('kecamatans')->insert($data);

    }
}
