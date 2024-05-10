<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;

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
    return view('home');
});

Auth::routes();

Route::middleware([User::class])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/info', [App\Http\Controllers\DurianController::class, 'info'])->name('info');
    Route::get('/showcreate', [App\Http\Controllers\DurianController::class, 'showcreate'])->name('showcreate');
    Route::post('/create', [App\Http\Controllers\DurianController::class, 'create'])->name('create');

    Route::get('/edit/{id}', [App\Http\Controllers\DurianController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [App\Http\Controllers\DurianController::class, 'update'])->name('update');

    Route::post('/search-gap', [App\Http\Controllers\DurianController::class, 'searchGap'])->name('search-gap');



    Route::post('/fetch-amphures-our', [App\Http\Controllers\DurianController::class, 'fetchAmphuresOur'])->name('fetch-amphures-our');
    Route::post('/fetch-districts-our', [App\Http\Controllers\DurianController::class, 'fetchDistrictsOur'])->name('fetch-districts-our');
    Route::post('/fetch-amphures-his', [App\Http\Controllers\DurianController::class, 'fetchAmphuresHis'])->name('fetch-amphures-his');
    Route::post('/fetch-districts-his', [App\Http\Controllers\DurianController::class, 'fetchDistrictsHis'])->name('fetch-districts-his');
});

Route::middleware([Admin::class])->group(function () {
    Route::get('info/all', [App\Http\Controllers\AdminController::class, 'infoAll'])->name('infoAll');
    Route::get('delete/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('delete');
    Route::get('/change/{id}', [App\Http\Controllers\AdminController::class, 'change'])->name('change');

    Route::get('check', [App\Http\Controllers\AdminController::class, 'check'])->name('check');
});




//pdf
Route::get('/pdf/{id}', [App\Http\Controllers\PDFController::class, 'pdf'])->name('pdf');
