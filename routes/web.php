<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::post('/verify', 'verifyToken')->name('verify');
    Route::get('/login', 'loginForm')->name('login.form');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'registerForm')->name('register.form');
    Route::post('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');
});

Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlists.index');
Route::get('/watchlist/{id}', [WatchlistController::class, 'showWatchlist'])->name('watchlist.show');
Route::get('/player/{id}', [WatchlistController::class, 'player'])->name('player');
