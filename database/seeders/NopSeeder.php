<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nops')->delete();

        $nik = array(
            array('id' => '1', 'user_id' => '8', 'nama_wp' => 'ABD. AZIZ, SH', 'alamat_wp' => 'DSN JATISARI', 'nop' => '351025000703000050', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '2', 'user_id' => '2', 'nama_wp' => 'HOLILAH', 'alamat_wp' => 'DSN JATISARI', 'nop' => '351025000703000060', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '3', 'user_id' => '3', 'nama_wp' => 'SUHRAN P FAUZI', 'alamat_wp' => 'DSN JATISARI', 'nop' => '351025000703000090', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '4', 'user_id' => '4', 'nama_wp' => 'H. MAHRUS', 'alamat_wp' => 'DSN JATISARI', 'nop' => '351025000703000110', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '5', 'user_id' => '5', 'nama_wp' => 'MANSURI', 'alamat_wp' => 'DSN JATISARI', 'nop' => '351025000703000120', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '6', 'user_id' => '6', 'nama_wp' => 'ALIMI', 'alamat_wp' => 'DSN JATISARI', 'nop' => '351025000703600340', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '7', 'user_id' => '7', 'nama_wp' => 'SATUNI', 'alamat_wp' => 'DSN JATISARI', 'nop' => '351025000703600710', 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('nops')->insert($nik);
    }
}
