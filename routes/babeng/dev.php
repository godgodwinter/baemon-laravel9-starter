<?php

use App\Helpers\Fungsi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dev\testingController;

Route::get('/dev/fungsi', function () {
    return Fungsi::tanggalindo('2020-02-19');
});

Route::get('/dev/admin/dashboard', function () {
    return Fungsi::tanggalindo('2020-02-19');
});

Route::get('/dev/admin/dashboard', [testingController::class, 'index'])->name('dev.admin.dashboard');
Route::get('/dev/admin/dashboard/notif', [testingController::class, 'notif'])->name('dev.admin.dashboard.notif');

