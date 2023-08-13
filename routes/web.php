<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::controller(AuthController::class)->group(function (){
    Route::get('/login','index')->name('login');
    Route::get('/register','register')->name('register');
    Route::get('/logout','logout')->name('logout')->middleware('auth');
    Route::post('/login','actionLogin')->name('actionLogin');
    Route::post('/register','actionRegister')->name('actinoRegister');
});

Route::prefix('admin')->controller(AdminController::class)->middleware('auth')->group(function () {
    Route::get('profil','profil')->name('profil');
    Route::get('trackingorder','listtracking')->name('tracking');
    Route::get('/','admin')->name('admin');
    Route::get('order','tambah')->name('tambah');
    Route::get('statusorder/{id}','tambahstatus')->name('tambahstatus');
    Route::post('order','store')->name('pesanan.store');
    Route::post('/statusorder','actiontambahstatus')->name('actionTambahStatus');
});


Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/b', function () {
    return view('b');
})->name('b');




