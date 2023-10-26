<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\DatadisiplinController;
use App\Http\Controllers\JenishukumanController;
use App\Http\Controllers\TambahinstansiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard',[
        "title"=>"Dashboard"
    ]);
});

Route::resource('tambahinstansi',TambahinstansiController::class)->except('show','destroy','create')->middleware('auth');
Route::resource('jenishukuman',JenishukumanController::class)->except('show','destroy','create')->middleware('auth');
Route::resource('pengguna',UserController::class)->except('destroy')->middleware('auth');
Route::resource('datadisiplin',DatadisiplinController::class)->middleware('auth');
Route::resource('rekap',RekapController::class);

Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('logout',[LoginController::class,'logout'])->middleware('auth');