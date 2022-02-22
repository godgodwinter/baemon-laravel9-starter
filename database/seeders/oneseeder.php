<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class oneseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        //ADMIN SEEDER
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            // 'password' => '$2y$10$oOhE/tcF8MC9crGCw/Zv5.zFMGu0JLm591undChCaHJM6YrnGjgCu',
            'tipeuser' => 'admin',
            'nomerinduk' => '123',
            'username' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

        DB::table('settings')->truncate();
         //settings SEEDER
        DB::table('settings')->insert([
            'app_nama' => 'Nama App',
            'app_namapendek' => 'Bae',
            'paginationjml' => '10',
            'lembaga_nama' => 'PT Baemon Indonesia',
            'lembaga_jalan' => 'Jl.Raya Ramai Sekali No 2 Kav. B',
            'lembaga_telp' => '0341-123456',
            'lembaga_kota' => 'Malang',
            'lembaga_logo' => 'assets/upload/logo.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);
    }
}
