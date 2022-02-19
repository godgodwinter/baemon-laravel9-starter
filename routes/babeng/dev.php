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
Route::get('/dev/barcode', [testingController::class, 'barcode'])->name('dev.barcode');
Route::get('/dev/qrcode', function () {
    return \QrCode::size(300)->generate('A basic example of QR code!');
});
Route::get('dev/qrcode2', function () {
    return \QrCode::size(300)
                    ->backgroundColor(255,55,0)
                    ->generate('A simple example of QR code');
});

Route::get('/dev/export', [testingController::class, 'export'])->name('dev.export');
Route::get('/dev/cetak', [testingController::class, 'cetak'])->name('dev.cetak');

