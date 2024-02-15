<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => ['role:Admin']], function ()
    {


       // nama nama crud
    });
    Route::group(['middleware' => ['role:Petugas|Admin']], function ()
    {


         // nama nama crud
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
