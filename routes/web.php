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
Route::post('/salesOrders/put', [App\Http\Controllers\SalesOrderController::class, 'putItem'])->where('barcode', '(.*)')->name('salesOrder.put');
Route::post('/salesOrders/postData', [App\Http\Controllers\SalesOrderController::class, 'storeData'])->name('salesOrder.storeData');
Route::post('/salesOrders/updateData', [App\Http\Controllers\SalesOrderController::class, 'updateData'])->name('salesOrder.updateData');
Route::post('/getdetails/{id}', [App\Http\Controllers\SalesOrderController::class, 'getdetails'])->name('salesOrder.getdetails');
Route::get('/salesOrders/{id}/{status}', [App\Http\Controllers\SalesOrderController::class, 'editStatus'])->name('salesOrder.editStatus');
Route::get('/salesOrdersShowAffari/{id}', [App\Http\Controllers\SalesOrderController::class, 'showAffari'])->name('salesOrder.showAffari');
Route::get('/getPdf/{id}', [App\Http\Controllers\SalesOrderController::class, 'export_pdf'])->name('salesOrder.getPdf')->where('id', '(.*)');
Route::get('/getExcel/{id}', [App\Http\Controllers\SalesOrderController::class, 'export_excel'])->name('salesOrder.export_excel')->where('id', '(.*)');
Route::get('/salesOrder/export_excel', [App\Http\Controllers\SalesOrderController::class, 'dashboard_export_excel'])->name('salesOrder.dashboard_excel');

//List order
Route::post('/salesOrders/deletelist', [App\Http\Controllers\ListOrderController::class, 'destroy'])->name('listOrder.delete');;
Route::post('/salesOrders/deleteall/{uid}', [App\Http\Controllers\ListOrderController::class, 'destroyAll'])->name('listOrder.deleteAll');;

//Search produk
Route::get('/search/', [App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('/searchdata', [App\Http\Controllers\SearchController::class, 'data'])->name('searchdata');

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

//Security
Route::get('/security', [App\Http\Controllers\SecurityController::class, 'index'])->name('security');

//Karyawan
Route::resource('karyawans', App\Http\Controllers\KaryawanController::class);

//Logbooks
Route::resource('logbooks', App\Http\Controllers\LogbookController::class);
Route::post('/logbooks/storedata', [App\Http\Controllers\LogbookController::class, 'storeajax'])->name('logbook.store');

//Logbook barang keluar
Route::resource('logbookBarangs', App\Http\Controllers\Logbook_barangController::class);
