<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use App\Models\settings;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class seederController extends Controller
{
    public function kategori(){
        $jmlseeder=5;
        $faker = Faker::create('id_ID');

        for($i=0;$i<$jmlseeder;$i++){
            DB::table('kategori')->insert([
                'nama' => $faker->unique()->name,
                'prefix' => $faker->unique()->address,
                'kode'=>$faker->unique()->username,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->route('dev.settings')->with('status','Proses berhasil !')->with('tipe','success');
    }
    public function hard(){
        kategori::truncate();

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
         return redirect()->route('dev.settings')->with('status','Proses berhasil !')->with('tipe','success');
    }

    public function soft(){
        kategori::truncate();
        return redirect()->route('dev.settings')->with('status','Proses berhasil !')->with('tipe','success');
    }
}
