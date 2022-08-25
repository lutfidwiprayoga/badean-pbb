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
            array('id' => '2', 'name' => 'HOLILAH', 'email' => 'holisah@gmail.com', 'username' => 'holisah', 'nik' => '3510144308700004', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '3', 'name' => 'SUHRAN', 'email' => 'suhran@gmail.com', 'username' => 'suhran', 'nik' => '3510140107650119', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '4', 'name' => 'H. MAHRUS', 'email' => 'mahrus@gmail.com', 'username' => 'mahrus', 'nik' => '3510141006400006', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '5', 'name' => 'MANSURI', 'email' => 'mansuri@gmail.com', 'username' => 'mansuri', 'nik' => '3510140307480004', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '6', 'name' => 'ALIMI', 'email' => 'alimi@gmail.com', 'username' => 'alimi', 'nik' => '3510142310930001', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '7', 'name' => 'SATUNI', 'email' => 'satuni@gmail.com', 'username' => 'satuni', 'nik' => '3510141204760002', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
            array('id' => '8', 'name' => 'ABD AZIZ, SH', 'email' => 'abdaziz@gmail.com', 'username' => 'abdaziz', 'nik' => '3510141402780005', 'alamat' => 'DNS JATISARI', 'no_hp' => '', 'role' => 'masyarakat', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('users')->insert($nik);
    }
}
