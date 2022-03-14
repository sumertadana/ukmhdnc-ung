<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidang')->insert(
            [
                'kode' => '2',
                'bidang' => 'Keagamaan',
            ],
        );
        DB::table('bidang')->insert(
            [
                'kode' => '2',
                'bidang' => 'Olahraga',
            ],
        );
        DB::table('bidang')->insert(
            [
                'kode' => '2',
                'bidang' => 'Penelitian Dan Pengembangan',
            ],
        );
        DB::table('bidang')->insert(
            [
                'kode' => '2',
                'bidang' => 'Kesekretariatan',
            ],
        );
        DB::table('bidang')->insert(
            [
                'kode' => '2',
                'bidang' => 'Seni dan Budaya',
            ]
        );

        // DB::table('bidang')->insert(
        //     [
        //         'kode' => '1',
        //         'bidang' => 'Pengurus Inti',
        //     ],
        // );
        DB::table('jabatan')->insert(
            [
                'kode_bidang' => '1',
                'jabatan' => 'Wakil Ketua',
            ],
        );
        DB::table('jabatan')->insert(
            [
                'kode_bidang' => '1',
                'jabatan' => 'Sekertaris Umum',
            ],
        );
        DB::table('jabatan')->insert(
            [
                'kode_bidang' => '1',
                'jabatan' => 'Bendahara Umum',
            ],
        );
        DB::table('jabatan')->insert(
            [
                'kode_bidang' => '2',
                'jabatan' => 'Sekertaris Bidang',
            ],
        );
        DB::table('jabatan')->insert(
            [
                'kode_bidang' => '2',
                'jabatan' => 'Ketua Bidang',
            ],
        );
        DB::table('jabatan')->insert(
            [
                'kode_bidang' => '2',
                'jabatan' => 'Anggota Bidang',
            ],
        );
        // DB::table('jabatan')->insert(
        //     [
        //         'kode_bidang' => '1',
        //         'jabatan' => 'Ketua Umum',
        //     ],
        // );
    }
}
