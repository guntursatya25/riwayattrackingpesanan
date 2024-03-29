<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::controller(AuthController::class)->group(function (){
    Route::get('/login','index')->middleware('guest')->name('login');
    Route::get('/register','register')->name('register');
    Route::get('/logout','logout')->middleware('auth')->name('logout');
    Route::post('/login','actionLogin')->middleware('guest')->name('actionLogin');
    Route::post('/register','actionRegister')->name('actinoRegister');
});

Route::prefix('admin')->controller(AdminController::class)->middleware('auth')->group(function () {
    Route::get('profil','profil')->name('profil');
    Route::get('trackingorder','listtracking')->name('tracking');
    Route::get('/','admin')->name('admin');
    Route::get('order','tambah')->name('tambah');
    Route::get('ulasan','ulasan')->name('ulasan');
    Route::get('statusorder/{id}','tambahstatus')->name('tambahstatus');
    Route::post('order','store')->name('pesanan.store');
    Route::post('statusorder','actiontambahstatus')->name('actionTambahStatus');
    Route::post('statusorderupdate','actionupdatestatus')->name('actionUpdateStatus');
    Route::post('statusorderdelete','deletestatus')->name('actionDeleteStatus');
    Route::post('profil','updateprofil')->name('actionupdateprofil');
});


Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/b', function () {
    return view('b');
})->name('b');




