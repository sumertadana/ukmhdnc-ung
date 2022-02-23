<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anggota')->insert([
            'nama' => 'I Made Sumertadana',
            'nim' => '531418062',
            'jk' => 'Laki-Laki',
            'alamat' => 'Wongkaditi',
            'fakultas' => 'Teknik',
            'jurusan' => 'Informatika',
            'angkatan' => '2018',
            'status' => 'Anggota Luar Biasa'
        ]);
    }
}
