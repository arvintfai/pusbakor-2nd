<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'PMDN',],
            ['nama' => 'Bukan PMA/PMDN',],
            ['nama' => 'PMA',],            
        ];

        DB::table('modals')->insert($data);
    }
}
