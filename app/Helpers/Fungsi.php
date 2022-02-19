<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Fungsi {
    public static function tanggalindo($inputan){
        //formatInputan : 2020-02-19
        $bulanindo='Januari';
        $str=explode("-",$inputan);
                if($str[1]=='01'){
                    $bulanindo='Januari';
                }elseif($str[1]=='02'){
                    $bulanindo='Februari';
                }elseif($str[1]=='03'){
                    $bulanindo='Maret';
                }elseif($str[1]=='04'){
                    $bulanindo='April';
                }elseif($str[1]=='05'){
                    $bulanindo='Mei';
                }elseif($str[1]=='06'){
                    $bulanindo='Juni';
                }elseif($str[1]=='07'){
                    $bulanindo='Juli';
                }elseif($str[1]=='08'){
                    $bulanindo='Agustus';
                }elseif($str[1]=='09'){
                    $bulanindo='September';
                }elseif($str[1]=='10'){
                    $bulanindo='Oktober';
                }elseif($str[1]=='11'){
                    $bulanindo='November';
                }else{
                    $bulanindo='Desember';
                }

        return $str[2]." ".$bulanindo." " .$str[0];
    }

    // getter and setter
    public static function app_nama(){
        $settings = DB::table('settings')->first();
        // dd($settings->first()->app_nama);
        if($settings!=null){
            $data=$settings->app_nama;
        }else{
            $data="Judul Aplikasi";
        }
        return $data;
    }
}
