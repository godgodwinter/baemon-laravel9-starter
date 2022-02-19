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
}
