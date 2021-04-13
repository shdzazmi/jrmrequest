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
//Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/synchronize', [App\Http\Controllers\HomeController::class, 'synchronize'])->name('synchronize');

//Request barang
Route::get('/requestbarang/export_excel', [App\Http\Controllers\requestbarangController::class, 'export_excel'])->name('export_excel');
Route::resource('requestbarangs', App\Http\Controllers\requestbarangController::class);
Route::delete('requestbarangs/delete/{query}', [App\Http\Controllers\requestbarangController::class, 'destroyAll'])->name('destroyAll');
Route::get('/requestbarangsall/{query?}', [App\Http\Controllers\requestbarangController::class, 'showAll'])->name('showAll');

//Sales order
Route::resource('salesOrders', App\Http\Controllers\SalesOrderController::class);

//Search produk
Route::get('/search/{query?}', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

//Lokasi produk
Route::get('/location', [App\Http\Controllers\LocationController::class, 'index'])->name('location');
Route::get('/location/search/01/{barcode}', [App\Http\Controllers\LocationController::class, 'search'])->name('location.search');
Route::get('/location/{barcode}/edit', [App\Http\Controllers\LocationController::class, 'edit'])->name('location.edit');
Route::get('/location/update', [App\Http\Controllers\LocationController::class, 'update'])->name('location.update');
