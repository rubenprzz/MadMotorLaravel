<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\PiezaController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Personal\PersonalAuthController;


Route::get('/', 'App\Http\Controllers\VehiculoController@hero')->name('vehiculos.hero');

Route::group(['prefix' => 'vehiculos'], function () {
    Route::get('/', [VehiculoController::class, 'index'])->name('vehiculos.index');
});

Route::group(['prefix' => 'carrito'], function () {
    Route::get('/index', [CarritoController::class, 'index'])->name('carrito.index')->middleware('auth');
    Route::get('/carrito/add/{id}/{type}', [CarritoController::class, 'addToCart'])->name('carrito.add')->middleware('auth');
    Route::get('/carrito/delete/{id}/{type}', [CarritoController::class, 'removeFromCart'])->name('carrito.delete')->middleware('auth');
    Route::get('/carrito/checkout', [CarritoController::class, 'checkout'])->name('carrito.checkout')->middleware('auth');
});
Route::group(['prefix' => 'pedido'], function () {
    Route::post('/checkout', [PedidoController::class, 'checkout'])->name('pedido.checkout')->middleware('auth');
    Route::get('/confirmado/{id}', [PedidoController::class, 'confirmacion'])->name('pedido.confirmacion')->middleware('auth');
    Route::get('/historial', [PedidoController::class, 'historial'])->name('pedido.historial')->middleware('auth');
    Route::get('/download/pedido/{id}', [PedidoController::class, 'download'])->name('pedido.download')->middleware('auth');
    Route::get('/download/historial/', [PedidoController::class, 'downloadHistorial'])->name('pedido.historial.download')->middleware('auth');

});
Route::group(['prefix' => 'piezas'], function () {
    Route::get('/', [PiezaController::class, 'index'])->name('piezas.index');
    Route::post('/create', [PiezaController::class, 'create'])->name('piezas.create')->middleware('auth', 'admin');
    Route::get('/create', [PiezaController::class, 'store'])->name('piezas.store')->middleware('auth', 'admin');
    Route::put('/{id}', [PiezaController::class, 'update'])->name('piezas.update')->middleware('auth', 'admin');
    Route::delete('/{id}', [PiezaController::class, 'destroy'])->name('piezas.destroy')->middleware('auth', 'admin');
    Route::get('/{id}', [PiezaController::class, 'show'])->name('piezas.show');
    Route::get('/{id}/edit', [PiezaController::class, 'edit'])->name('piezas.edit')->middleware('auth', 'admin');
    Route::put('/{id}/edit', [PiezaController::class, 'update'])->name('piezas.update')->middleware('auth', 'admin');

});

Route::get('/admin/panel', function () {
    return view('admin.panel');
})->name('panel')->middleware('auth', 'admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'perfil'], function () {
    Route::get('/{id}', [ClientesController::class, 'show'])->name('cliente.perfil')->middleware('auth');
    Route::get('/{id}/edit', [ClientesController::class, 'edit'])->name('cliente.edit')->middleware('auth');
    Route::put('/{id}', [ClientesController::class, 'update'])->name('cliente.update')->middleware('auth');
    Route::get('/{id}/soft', [ClientesController::class, 'removeSoft'])->name('cliente.removeSoft')->middleware('auth');

});


Route::group(['prefix' => 'personal'], function () {
    Route::get('/create', [PersonalController::class, 'create'])->name('personal.create')->middleware('auth', 'admin');
    Route::post('/store', [PersonalController::class, 'store'])->name('personal.store')->middleware('auth', 'admin');
    Route::get('/show/{id}', [PersonalController::class, 'show'])->name('personal.show')->middleware('auth', 'admin');
    Route::get('/', [PersonalController::class, 'index'])->name('personal.search')->middleware('auth', 'admin');
    Route::get('/{id}/edit', [PersonalController::class, 'edit'])->name('personal.edit')->middleware('auth', 'admin');
    Route::put('/{id}/update', [PersonalController::class, 'update'])->name('personal.update')->middleware('auth', 'admin');
    Route::delete('/{id}/delete', [PersonalController::class, 'destroy'])->name('personal.destroy')->middleware('auth', 'admin');
});

