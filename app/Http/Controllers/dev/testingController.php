<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testingController extends Controller
{
    public function index(){
        $pages='dashboard';
        return view('pages.dev.dashboard.index');
    }
    public function notif(){
        return redirect()->route('dev.admin.dashboard')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function barcode(){
        $pages='dashboard';
        return view('pages.dev.testing.barcode');
    }
}
