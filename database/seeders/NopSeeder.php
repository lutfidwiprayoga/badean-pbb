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
            array('id' => '1', 'nop' => '351025000703000050', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '2', 'nop' => '351025000703000060', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '3', 'nop' => '351025000703000090', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '4', 'nop' => '351025000703000110', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '5', 'nop' => '351025000703000120', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '6', 'nop' => '351025000703600340', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '7', 'nop' => '351025000703600710', 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('nops')->insert($nik);
    }
}
