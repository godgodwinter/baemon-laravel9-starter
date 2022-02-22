<?php

namespace App\Http\Controllers\dev;

use App\Exports\exportusers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class testingController extends Controller
{
    public function index(){
        $pages='dashboard';
        return view('pages.dev.dashboard.index',compact('pages'));
    }
    public function notif(){
        return redirect()->route('dev.admin.dashboard')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function barcode(){
        $pages='dashboard';
        return view('pages.dev.testing.barcode');
    }
    public function export(){
        $tgl=date("YmdHis");
		return Excel::download(new exportusers(), 'data'.'-'.$tgl.'.xlsx');
    }
    public function cetak(){

        $tgl=date("YmdHis");
        $pdf = PDF::loadview('pages.dev.testing.cetak')->setPaper('a4', 'potrait');
        return $pdf->stream('data'.$tgl.'.pdf');
    }
}
