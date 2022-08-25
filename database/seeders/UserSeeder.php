<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Admin',
        //     'username' => 'admin',
        //     'nik' => '-',
        //     'alamat' => 'Banyuwangi Badean',
        //     'no_hp' => '-',
        //     'role' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);
        DB::table('users')->delete();

        $nik = array(
            array('id' => '1', 'name' => 'ADMIN', 'email' => 'admin@gmail.com', 'username' => 'admin', 'nik' => '-', 'alamat' => 'DNS JATISARI', 'no_hp' => '-', 'role' => 'admin', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '2', 'name' => 'HOLISAH', 'email' => 'holisah@gmail.com', 'username' => 'holisah', 'nik' => '3510144407800006', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '3', 'name' => 'RUDIANTO', 'email' => 'rudianto@gmail.com', 'username' => 'rudianto', 'nik' => '3510140404050002', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '4', 'name' => 'ARMIDIANTO', 'email' => 'armidianto@gmail.com', 'username' => 'armidianto', 'nik' => '3510142712060002', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '5', 'name' => 'ALIMI', 'email' => 'alimi@gmail.com', 'username' => 'alimi', 'nik' => '3510141404600002', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '6', 'name' => 'JANATIN', 'email' => 'janatin@gmail.com', 'username' => 'janatin', 'nik' => '3510145004600003', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '7', 'name' => 'MUDREAH', 'email' => 'mudreah@gmail.com', 'username' => 'mudreah', 'nik' => '3510145611450003', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '8', 'name' => 'SUWADAK', 'email' => 'suwadak@gmail.com', 'username' => 'suwadak', 'nik' => '3510141010850006', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '9', 'name' => 'MASITAH', 'email' => 'masitah@gmail.com', 'username' => 'masitah', 'nik' => '3510144411900004', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '10', 'name' => 'ROBI LIYANTO', 'email' => 'robiliyanto@gmail.com', 'username' => 'robiliyanto', 'nik' => '3510141512060005', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '11', 'name' => 'SATUNI', 'email' => 'satuni@gmail.com', 'username' => 'satuni', 'nik' => '3510141204760002', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('users')->insert($nik);
    }
}
