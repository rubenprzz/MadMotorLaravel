<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Personal\PersonalAuthController;

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
    return view('hero');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('personal')->name('personal.')->group(function () {

    Route::middleware(['guest:personal'])->group(function(){
        Route::view('/login','personal.login')->name('login');
        Route::post('/check',[PersonalAuthController::class,'check'])->name('check');
    });

    Route::middleware(['auth:personal'])->group(function(){
        Route::view('/home','personal.home')->name('home');
        Route::post('/logout',[PersonalAuthController::class,'logout'])->name('logout');
    });
});
