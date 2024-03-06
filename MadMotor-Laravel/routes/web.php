<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PersonalController;
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
    Route::get('/index',[CarritoController::class, 'index'])->name('carrito.index');
    Route::get('/carrito/add/{id}/{type}', [CarritoController::class, 'addToCart'])->name('carrito.add');
    Route::get('/carrito/delete/{id}/{type}', [CarritoController::class, 'removeFromCart'])->name('carrito.delete');
});
Route::group(['prefix'=>'piezas'],function (){
    Route::get('/',[PiezaController::class, 'index'])->name('piezas.index');
    Route::post('/create',[PiezaController::class, 'store'])->name('piezas.store');
    Route::put('/{id}',[PiezaController::class, 'update'])->name('piezas.update');
    Route::delete('/{id}',[PiezaController::class, 'destroy'])->name('piezas.destroy');
    Route::get('/{id}',[PiezaController::class, 'show'])->name('piezas.show');
    Route::get('/{id}/edit',[PiezaController::class, 'edit'])->name('piezas.edit');
    Route::put('/{id}/edit',[PiezaController::class, 'update'])->name('piezas.update');

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
//        Route::get('/', [PersonalController::class, 'index'])->name('personal.index');
        Route::get('/create', [PersonalController::class, 'create'])->name('personal.create');
        Route::get('/show/{id}', [PersonalController::class, 'show'])->name('personal.show');
        Route::get('/', [PersonalController::class, 'index'])->name('personal.search');
//        Route::get('/{id}/edit', [PersonalController::class, 'edit'])->name('personal.edit')->middleware('auth');
//        Route::get('/create', [PersonalController::class, 'create'])->name('personal.create')->middleware('auth');
//        Route::get('/index', [PersonalController::class, 'index'])->name('personal.index')->middleware('auth');


    });

Route::get('/panel', function () {
    return view('admin.panel');
})->name('panel');
