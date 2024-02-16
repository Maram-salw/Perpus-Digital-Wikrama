<?php

use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => true
]);

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => ['role:Admin']], function ()
    {
        Route::resource('/bukus', BukuController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/peminjamans', PeminjamanController::class);
        Route::resource('/anggotas', AnggotaController::class);
        Route::resource('/historis', HistoriController::class);
    });
    Route::group(['middleware' => ['role:Petugas|Admin']], function ()
    {
        Route::resource('/bukus', BukuController::class);
        Route::resource('/peminjamans', PeminjamanController::class);
        Route::resource('/anggotas', AnggotaController::class);

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
