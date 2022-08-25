<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('niks')->delete();

        $nik = array(
            array('id' => '1', 'nik' => '3510141204760002', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '2', 'nik' => '3510144407800006', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '3', 'nik' => '3510140404050002', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '4', 'nik' => '3510142712060002', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '5', 'nik' => '3510141404600002', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '6', 'nik' => '3510145004600003', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '7', 'nik' => '3510145611450003', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '8', 'nik' => '3510141010850006', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '9', 'nik' => '3510144411900004', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '10', 'nik' => '3510141512060005', 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('niks')->insert($nik);
    }
}
