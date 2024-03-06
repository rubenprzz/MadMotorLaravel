<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Personal\PersonalAuthController;


Route::get('/', 'App\Http\Controllers\VehiculoController@hero')->name('vehiculos.hero');

Route::group(['prefix' => 'vehiculos'], function (){
    Route::get('/', [VehiculoController::class,'index'])->name('vehiculos.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'perfil'], function () {
    Route::get('/{id}', [ClientesController::class, 'show'])->name('cliente.perfil')->middleware('auth');
    Route::get('/{id}/edit', [ClientesController::class, 'edit'])->name('cliente.edit')->middleware('auth');
    Route::put('/{id}', [ClientesController::class, 'update'])->name('cliente.update')->middleware('auth');

});

/*Route::prefix('personal')->name('personal.')->group(function () {

    Route::middleware(['guest:personal'])->group(function () {
        Route::view('/login', 'personal.login')->name('login');
        Route::post('/check', [PersonalAuthController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:personal'])->group(function () {
        Route::view('/home', 'personal.home')->name('home');
        Route::post('/logout', [PersonalAuthController::class, 'logout'])->name('logout');
    });});*/

    Route::group(['prefix' => 'personal'], function () {
        Route::get('/create', [PersonalController::class, 'create'])->name('personal.create');
        Route::post('/store', [PersonalController::class, 'store'])->name('personal.store');
        Route::get('/show/{id}', [PersonalController::class, 'show'])->name('personal.show');
        Route::get('/', [PersonalController::class, 'index'])->name('personal.search');
        Route::get('/{id}/edit', [PersonalController::class, 'edit'])->name('personal.edit');
        Route::put('/{id}/update', [PersonalController::class, 'update'])->name('personal.update');


    });

