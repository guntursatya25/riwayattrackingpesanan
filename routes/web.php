<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Models\Pesanan;

Route::controller(AuthController::class)->group(function (){
    Route::get('/login','index')->name('login');
    Route::get('/register','register')->name('register');
    Route::get('/logout','logout')->name('logout')->middleware('auth');
    Route::post('/login','actionLogin')->name('actionLogin');
    Route::post('/register','actionRegister')->name('actinoRegister');
});

Route::prefix('admin')->controller(AdminController::class)->middleware('auth')->group(function () {
    Route::get('order','tambah')->name('tambah');
    Route::post('order','store')->name('pesanan.store');
    Route::get('trackingorder','listtracking')->name('tracking');
    Route::get('tambahin/{id}','tambahstatus')->name('tambahstatus');
});

Route::post('/tambahin',[AdminController::class, 'actiontambahstatus'])->name('actionTambahStatus');

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/admin', function () {
    return view('admin.admin');
})->middleware('auth')->name('admin');

