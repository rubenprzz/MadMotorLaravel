<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\PiezaController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Personal\PersonalAuthController;


Route::get('/', 'App\Http\Controllers\VehiculoController@hero')->name('vehiculos.hero');

Route::group(['prefix' => 'vehiculos'], function (){
    Route::get('/', [VehiculoController::class,'index'])->name('vehiculos.index');
});

Route::group(['prefix'=>'carrito'],function (){
    Route::get('/',[CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/add',[CarritoController::class, 'add'])->name('carrito.add');
    Route::delete('/{id}',[CarritoController::class, 'delete'])->name('carrito.delete');
    Route::post('/checkout',[CarritoController::class, 'checkout'])->name('carrito.checkout');
});
Route::group(['prefix'=>'piezas'],function (){
    Route::get('/',[PiezaController::class, 'index'])->name('piezas.index');
    Route::post('/create',[PiezaController::class, 'store'])->name('piezas.store');
    Route::put('/{id}',[PiezaController::class, 'update'])->name('piezas.update');
    Route::delete('/{id}',[PiezaController::class, 'destroy'])->name('piezas.destroy');
    Route::get('/{id}',[PiezaController::class, 'show'])->name('piezas.show');
    Route::put('/{id}/edit',[PiezaController::class, 'edit'])->name('piezas.edit');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'perfil'], function () {
    Route::get('/{id}', [ClientesController::class, 'show'])->name('cliente.perfil')->middleware('auth');
    Route::get('/{id}/edit', [ClientesController::class, 'edit'])->name('cliente.edit')->middleware('auth');
    Route::put('/{id}', [ClientesController::class, 'update'])->name('cliente.update')->middleware('auth');
    Route::get('/{id}/soft', [ClientesController::class, 'removeSoft'])->name('cliente.removeSoft')->middleware('auth');

});

Route::prefix('personal')->name('personal.')->group(function () {

    Route::middleware(['guest:personal'])->group(function () {
        Route::view('/login', 'personal.login')->name('login');
        Route::post('/check', [PersonalAuthController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:personal'])->group(function () {
        Route::view('/home', 'personal.home')->name('home');
        Route::post('/logout', [PersonalAuthController::class, 'logout'])->name('logout');
    });
});

Route::get('/panel', function () {
    return view('admin.panel');
})->name('panel');
