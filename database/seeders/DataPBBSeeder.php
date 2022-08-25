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
            array('id' => '1', 'nama' => 'SATUNI', 'tahun' => '2022', 'pbb' => '28934', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'user_id' => '2', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '2', 'nama' => 'H. NIKMAH', 'tahun' => '2022', 'pbb' => '47265', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'user_id' => '3', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '3', 'nama' => 'ABD. AZIZ, SH', 'tahun' => '2022', 'pbb' => '76645', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'user_id' => '4', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '4', 'nama' => 'HOLILAH', 'tahun' => '2022', 'pbb' => '38754', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'user_id' => '6', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '5', 'nama' => 'ALIMI', 'tahun' => '2022', 'pbb' => '16622', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'user_id' => '5', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '6', 'nama' => 'ZUBAIDAH ABD. ROHMAN', 'tahun' => '2022', 'pbb' => '67299', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'user_id' => '7', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '7', 'nama' => 'SUHRAN P FAUZI', 'tahun' => '2022', 'pbb' => '82814', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'user_id' => '8', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '8', 'nama' => 'H. MAHRUS', 'tahun' => '2022', 'pbb' => '33760', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'user_id' => '9', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '9', 'nama' => 'MANSURI', 'tahun' => '2022', 'pbb' => '22000', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'user_id' => '10', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '10', 'nama' => 'ABD HADI P IWAN', 'tahun' => '2022', 'pbb' => '37052', 'denda' => '0', 'kekurangan' => '0', 'status_bayar' => 'LUNAS', 'kode_bayar' => 'LUNAS', 'user_id' => '11', 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('pbbs')->insert($nik);
        DB::table('cetaks')->delete();

        $nik = array(
            array('pbb_id' => '1', 'nop' => ' 351025000703600710', 'nama_wp' => 'SATUNI', 'alamat_wp' => 'DSN JATISARI', 'tanggal_print' => null, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '2', 'nop' => ' 351025000703000040', 'nama_wp' => 'H. NIKMAH', 'alamat_wp' => 'DSN JATISARI', 'tanggal_print' => null, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '3', 'nop' => ' 351025000703000900', 'nama_wp' => 'ABD. AZIZ, SH', 'alamat_wp' => 'DSN JATISARI', 'tanggal_print' => null, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '4', 'nop' => ' 351025000703000060', 'nama_wp' => 'HOLILAH', 'alamat_wp' => 'DSN JATISARI', 'tanggal_print' => null, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '5', 'nop' => ' 351025000703600340', 'nama_wp' => 'ALIMI', 'alamat_wp' => 'DSN JATISARI', 'tanggal_print' => null, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '6', 'nop' => ' 351025000703000080', 'nama_wp' => 'ZUBAIDAH ABD. ROHMAN', 'alamat_wp' => 'DSN JATISARI', 'tanggal_print' => null, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '7', 'nop' => ' 351025000703000090', 'nama_wp' => 'SUHRAN P FAUZI', 'alamat_wp' => 'DSN JATISARI', 'tanggal_print' => null, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '8', 'nop' => ' 351025000703000110', 'nama_wp' => 'H. MAHRUS', 'alamat_wp' => 'DSN JATISARI', 'tanggal_print' => null, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '9', 'nop' => ' 351025000703000120', 'nama_wp' => 'MANSURI', 'alamat_wp' => 'DSN JATISARI', 'tanggal_print' => null, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
            array('pbb_id' => '10', 'nop' => ' 351025000703000130', 'nama_wp' => 'ABD HADI P IWAN', 'alamat_wp' => 'DSN JATISARI', 'tanggal_print' => null, 'jatuh_tempo' => now(), 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('cetaks')->insert($nik);
    }
}
