<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPBBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pbbs')->delete();

        $nik = array(
            array('id' => '1', 'nop_id' => '7',  'tahun' => '2021', 'pbb' => '28934', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 202208037, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '2', 'nop_id' => '1',  'tahun' => '2021', 'pbb' => '76645', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 202208038, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '3', 'nop_id' => '2',  'tahun' => '2021', 'pbb' => '38754', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 202208032, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '4', 'nop_id' => '6',  'tahun' => '2021', 'pbb' => '16622', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 202208036, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '5', 'nop_id' => '3',  'tahun' => '2021', 'pbb' => '82814', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 202208033, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '6', 'nop_id' => '4',  'tahun' => '2021', 'pbb' => '33760', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 202208034, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '7', 'nop_id' => '5',  'tahun' => '2021', 'pbb' => '22000', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 202208035,  'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('pbbs')->insert($nik);
        DB::table('cetaks')->delete();

        $nik = array(
            array('pbb_id' => '1', 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '2', 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '3', 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '4', 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '5', 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '6', 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '7', 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '8', 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '9', 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '10', 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('cetaks')->insert($nik);
    }
}
