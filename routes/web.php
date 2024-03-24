<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create', [App\Http\Controllers\DurianController::class, 'showcreate'])->name('showcreate');

Route::post('/fetch-amphures-our', [App\Http\Controllers\DurianController::class, 'fetchAmphuresOur'])->name('fetch-amphures-our');
Route::post('/fetch-districts-our', [App\Http\Controllers\DurianController::class, 'fetchDistrictsOur'])->name('fetch-districts-our');
Route::post('/fetch-amphures-his', [App\Http\Controllers\DurianController::class, 'fetchAmphuresHis'])->name('fetch-amphures-his');
Route::post('/fetch-districts-his', [App\Http\Controllers\DurianController::class, 'fetchDistrictsHis'])->name('fetch-districts-his');
