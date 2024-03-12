<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            DesaSeeder::class  
        );
        $this->call(
            KecamatanSeeder::class 
        );
        $this->call(
            JenisPerusahaanSeeder::class 
        );
        $this->call(
            PerusahaanSeeder::class 
        );
        $this->call(
            ModalSeeder::class 
        );
        $this->call(
            ResikoSeeder::class 
        );
        $this->call(
            SkalaUsahaSeeder::class 
        );
        $this->call(
            KBLISeeder::class 
        );
        $this->call(
            ProyekSeeder::class 
        );
    }
}
