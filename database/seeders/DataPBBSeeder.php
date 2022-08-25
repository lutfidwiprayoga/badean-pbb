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
            array('id' => '1', 'user_id' => '7', 'nop_id' => '7', 'nama_wp' => 'SATUNI', 'alamat_wp' => 'DSN JATISARI', 'tahun' => '2021', 'pbb' => '28934', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '2', 'user_id' => '8', 'nop_id' => '1', 'nama_wp' => 'ABD. AZIZ, SH', 'alamat_wp' => 'DSN JATISARI', 'tahun' => '2021', 'pbb' => '76645', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '3', 'user_id' => '2', 'nop_id' => '2', 'nama_wp' => 'HOLILAH', 'alamat_wp' => 'DSN JATISARI', 'tahun' => '2021', 'pbb' => '38754', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '4', 'user_id' => '6', 'nop_id' => '6', 'nama_wp' => 'ALIMI', 'alamat_wp' => 'DSN JATISARI', 'tahun' => '2021', 'pbb' => '16622', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '5', 'user_id' => '3', 'nop_id' => '3', 'nama_wp' => 'SUHRAN P FAUZI', 'alamat_wp' => 'DSN JATISARI', 'tahun' => '2021', 'pbb' => '82814', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '6', 'user_id' => '4', 'nop_id' => '4', 'nama_wp' => 'H. MAHRUS', 'alamat_wp' => 'DSN JATISARI', 'tahun' => '2021', 'pbb' => '33760', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '7', 'user_id' => '5', 'nop_id' => '5', 'nama_wp' => 'MANSURI', 'alamat_wp' => 'DSN JATISARI', 'tahun' => '2021', 'pbb' => '22000', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS',  'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
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
