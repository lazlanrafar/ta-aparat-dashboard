<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nip' => '0000000000000000',
            'username' => 'pegawai',
            'email' => 'pegawai@gmail.com',
            'nama' => 'pegawai',
            'jabatan' => 'pegawai',
            'notelp' => '088888',
            'jenis_kelamin' => 'perempuan',
            'level' => 'pegawai',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'nip' => '0000000000000000',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'nama' => 'admin',
            'jabatan' => 'admin',
            'notelp' => '088888',
            'jenis_kelamin' => 'perempuan',
            'level' => 'Administrasi Umum',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'nip' => '0000000000000000',
            'username' => 'kabag',
            'email' => 'kabag@gmail.com',
            'nama' => 'kabag',
            'jabatan' => 'kabag',
            'notelp' => '088888',
            'jenis_kelamin' => 'perempuan',
            'level' => 'Kabag Umum',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'nip' => '0000000000000000',
            'username' => 'kasubbag',
            'email' => 'kasubbag@gmail.com',
            'nama' => 'kasubbag',
            'jabatan' => 'kasubbag',
            'notelp' => '088888',
            'jenis_kelamin' => 'perempuan',
            'level' => 'Kasubbag Kepegawaian',
            'password' => Hash::make('123'),
        ]);
    }
}
