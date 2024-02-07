<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// autentikasi Users
Route::middleware('auth')->group(function () {

    // menu utama
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // hanya admin yang bisa akses
    Route::middleware('role:Admin')->group(function () {

        Route::get('/admin', function () {
            return view('components.master');
        })->name('admin');

    });

    // hanya petugas yang bisa akses
    Route::middleware('role:Petugas')->group(function () {

        Route::get('/petugas', function () {
            return view('components.master');
        })->name('petugas');

    });

});
