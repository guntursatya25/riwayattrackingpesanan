<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(AuthController::class)->group(function (){
Route::get('/login','index')->name('login');
Route::get('/register','register')->name('register');
Route::get('/logout','logout')->name('logout');
Route::post('/login','actionLogin')->name('actionLogin');
Route::post('/register','actionRegister')->name('actinoRegister');

});

Route::get('/', function () {
    return view('index');
});
Route::get('/admin', function () {
    return view('admin.admin');
});

