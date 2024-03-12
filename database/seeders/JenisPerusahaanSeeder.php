<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['jenis_perusahaan' => 'Perorangan',],
            ['jenis_perusahaan' => 'Perseroan Terbatas (PT)',],
            ['jenis_perusahaan' => 'Persekutuan Komanditer (CV / Commanditaire Vennootschap)',],
            ['jenis_perusahaan' => 'Koperasi',],
            ['jenis_perusahaan' => 'Badan Layanan Umum (BLU)',],
            ['jenis_perusahaan' => 'Persekutuan Firma (Fa / Venootschap Onder Firma)',],
            ['jenis_perusahaan' => 'Badan Hukum Lainnya',],
            ['jenis_perusahaan' => 'Yayasan',],
            ['jenis_perusahaan' => 'Perseroan Terbatas (PT) Perorangan',],
            ['jenis_perusahaan' => 'Persyarikatan atau Perkumpulan',],            
        ];
        DB::table('jenis_perusahaans')->insert($data);
    }
}
