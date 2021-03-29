<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('requests', App\Http\Controllers\requestController::class);
Route::get('/request/export_excel', [App\Http\Controllers\requestController::class, 'export_excel'])->name('export_excel');
Route::get('/requestbarang/export_excel', [App\Http\Controllers\requestbarangController::class, 'export_excel'])->name('export_excel');

Route::resource('requestbarangs', App\Http\Controllers\requestbarangController::class);