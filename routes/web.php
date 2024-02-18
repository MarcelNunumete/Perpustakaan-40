<?php

use App\Http\Controllers\BookadminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PinjambukuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboardadmin')->middleware('auth');

Route::resource('/bookadmin', BookadminController::class);


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::resource('/pinjambuku', PinjambukuController::class);

//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::patch('/peminjaman/{id}', [PeminjamanController::class, 'updateStatus'])->name('update-status');




Route::get('/', function(){
    return view('welcome');
});
