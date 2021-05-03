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
Route::delete('requestbarangs/delete/{query}', [App\Http\Controllers\requestbarangController::class, 'destroyAll'])->name('destroyAll')->where('query', '(.*)');
Route::get('/requestbarangsall/{query?}', [App\Http\Controllers\requestbarangController::class, 'showAll'])->name('showAll')->where('query', '(.*)');

//Sales order
Route::resource('salesOrders', App\Http\Controllers\SalesOrderController::class);
Route::post('/salesOrders/put/{barcode}', [App\Http\Controllers\SalesOrderController::class, 'putItem'])->where('barcode', '(.*)')->name('salesOrder.put');
Route::post('/salesOrders/postData', [App\Http\Controllers\SalesOrderController::class, 'storeData'])->name('salesOrder.storeData');
Route::post('/salesOrders/updateData', [App\Http\Controllers\SalesOrderController::class, 'updateData'])->name('salesOrder.updateData');
Route::post('/getdetails/{id}', [App\Http\Controllers\SalesOrderController::class, 'getdetails'])->name('salesOrder.getdetails');
Route::get('/salesOrders/{id}/{status}', [App\Http\Controllers\SalesOrderController::class, 'editStatus'])->name('salesOrder.editStatus');
Route::get('/getPdf/{id}', [App\Http\Controllers\SalesOrderController::class, 'export_pdf'])->name('salesOrder.getPdf');
Route::get('/getExcel/{id}', [App\Http\Controllers\SalesOrderController::class, 'export_excel'])->name('salesOrder.export_excel');

//List order
Route::post('/salesOrders/deletelist', [App\Http\Controllers\ListOrderController::class, 'destroy'])->name('listOrder.delete');;

//Search produk
Route::get('/search/{query?}', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

//Lokasi produk
Route::get('/location', [App\Http\Controllers\LocationController::class, 'index'])->name('location');
Route::get('/location/search/barcode/{barcode}', [App\Http\Controllers\LocationController::class, 'search'])->where('barcode', '(.*)')->name('location.search');
Route::get('/location/search/lokasi/{lokasi}', [App\Http\Controllers\LocationController::class, 'searchs'])->name('location.searchs');
Route::get('/location/search/{barcode}', [App\Http\Controllers\LocationController::class, 'search'])->where('barcode', '(.*)');;
Route::get('/location/{barcode}/edit', [App\Http\Controllers\LocationController::class, 'edit'])->name('location.edit')->where('barcode', '(.*)');
Route::post('/location/store', [App\Http\Controllers\LocationController::class, 'store'])->name('location.store');
Route::post('/location/update/{barcode}/{lokasi}', [App\Http\Controllers\LocationController::class, 'update'])->name('location.update')->where('barcode', '(.*)');;
Route::post('/location/put/{barcode}', [App\Http\Controllers\LocationController::class, 'putItem'])->name('location.put')->where('barcode', '(.*)');

//Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/edit/{id}/{role}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
Route::get('/admin/show/{id}', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.show');
Route::post('/admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/update', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
