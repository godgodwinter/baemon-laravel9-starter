<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use App\Models\settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class settingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()){
                if(Auth::user()->tipeuser!='admin'){
                    return redirect()->route('dashboard')->with('status','Halaman tidak ditemukan!')->with('tipe','danger');
                }
            }else{
                return redirect()->route('dashboard')->with('status','Halaman tidak ditemukan!')->with('tipe','danger');
            }

        return $next($request);

        });
    }
    public function index(){
        $pages='settings';
        $item=DB::table('settings')->where('id',1)->first();
        return view('pages.dev.settings.index',compact('item','pages'));
    }
    public function update(settings $item,Request $request){
        // dd($request,$item);
        settings::where('id',$item->id)
        ->update([
            'app_nama' => $request->app_nama,
            'app_namapendek' => $request->app_namapendek,
           'updated_at'=>date("Y-m-d H:i:s")
        ]);
        return redirect()->route('dev.settings')->with('status','Data berhasil diubah!')->with('tipe','success');
    }
}
