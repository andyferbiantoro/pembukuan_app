<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JamurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/panen_index', [JamurController::class, 'panen_index'])->name('panen_index');
Route::post('/panen_add', [JamurController::class, 'panen_add'])->name('panen_add');
Route::post('/panen_delete/{id}', [JamurController::class, 'panen_delete'])->name('panen_delete');


Route::get('/penjualan', [JamurController::class, 'penjualan_index'])->name('penjualan_index');
Route::post('/penjualan_add', [JamurController::class, 'penjualan_add'])->name('penjualan_add');
Route::post('/penjualan_delete/{id}', [JamurController::class, 'penjualan_delete'])->name('penjualan_delete');

Route::get('/laporan', [JamurController::class, 'laporan_index'])->name('laporan_index');
