<?php

use App\Helpers\Fungsi;
use App\Http\Controllers\crudController;
use App\Http\Controllers\dev\seederController;
use App\Http\Controllers\dev\settingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dev\testingController;

Route::get('/dev/fungsi', function () {
    return Fungsi::tanggalindo('2020-02-19');
});

Route::get('/dev/admin/dashboard', function () {
    return Fungsi::tanggalindo('2020-02-19');
});


Route::get('/dashboard', [testingController::class, 'index'])->name('dashboard');
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


//pages
Route::get('/dev/crud', [crudController::class, 'index'])->name('dev.crud');
Route::get('/dev/crud/create', [crudController::class, 'create'])->name('dev.crud.create');
Route::post('/dev/crud/store', [crudController::class, 'store'])->name('dev.crud.store');
Route::get('/dev/crud/edit/{item}', [crudController::class, 'edit'])->name('dev.crud.edit');
Route::put('/dev/crud/update/{item}', [crudController::class, 'update'])->name('dev.crud.update');
Route::delete('/dev/crud/destroy/{item}', [crudController::class, 'destroy'])->name('dev.crud.destroy');

//settings
Route::get('/dev/settings', [settingsController::class, 'index'])->name('dev.settings');
Route::put('/dev/settings/{item}', [settingsController::class, 'update'])->name('dev.settings.update');
//seeder and reset
Route::post('/dev/seeder/kategori', [seederController::class, 'kategori'])->name('dev.seeder.kategori');
Route::post('/dev/seeder/hard', [seederController::class, 'hard'])->name('dev.seeder.hard');
Route::post('/dev/seeder/soft', [seederController::class, 'soft'])->name('dev.seeder.soft');
