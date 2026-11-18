<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan hanya ada 1 data setting
        DB::table('settings')->truncate();

        DB::table('settings')->insert(
            [
                // ======================
                // DATA DESA
                // ======================
                'village_name'     => 'ArumJaya',
                'village_address'  => 'Jl. Raya Arum Jaya No. 1',
                'village_phone'    => '0895376601382',
                'village_email'    => 'info@desaarumjaya.id',
                'village_website'  => 'https://desaarumjaya.id',
                'village_logo'     => null,

                // ======================
                // WILAYAH ADMINISTRATIF
                // ======================
                'subdistrict_name' => 'Purwoadadi',
                'regency_name'     => 'Purworejo',
                'province_name'    => 'Jawa Tengah',

                // ======================
                // DATA KEPALA DESA
                // ======================
                'official_name'     => 'Dimas Aji',
                'official_position' => 'Kepala Desa',
                'official_phone'    => '0895376601382',
                'official_email'    => 'kades@desaarumjaya.id',
                'official_nipd'     => '35743275383',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
