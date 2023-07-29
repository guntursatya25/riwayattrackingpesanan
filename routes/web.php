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
    Route::get('order','tambah')->name('tambah');
    Route::get('trackingorder','listtracking')->name('tracking');
});

Route::get('/', function () {
    return view('index');
});
Route::get('/admin', function () {
    return view('admin.admin');
})->middleware('auth')->name('admin');

