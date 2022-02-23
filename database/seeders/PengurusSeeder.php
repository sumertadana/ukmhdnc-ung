<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengurus')->insert([
            'nama' => ' Arjuna',
            'nim' => '121212129',
            'bidang' => 'Pengurus Inti',
            'jabatan' => 'Ketua Umum',
            'periode' => '2022',
            'foto' => 'team-1.jpg'
        ]);
    }
}
