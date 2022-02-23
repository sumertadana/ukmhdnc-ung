<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventaris')->insert([
            'nama' => 'Komputer',
            'kode' => 'A12',
            'jumlah' => '10',
            'kondisi' => 'Baik',
        ]);
    }
}
