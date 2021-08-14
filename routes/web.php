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
Route::get('/darkmode', [App\Http\Controllers\HomeController::class, 'toggle_darkmode'])->name('darkmode');

//Request barang
Route::get('/requestbarang/export_excel', [App\Http\Controllers\requestbarangController::class, 'export_excel'])->name('export_excel');
Route::resource('requestbarangs', App\Http\Controllers\requestbarangController::class);
Route::delete('requestbarangs/delete/{query}', [App\Http\Controllers\requestbarangController::class, 'destroyAll'])->name('destroyAll')->where('query', '(.*)');
Route::get('/requestbarang/approval', [App\Http\Controllers\requestbarangController::class, 'index_approval'])->name('requestbarang.index_approval');
Route::get('/requestbarang/request/{id}', [App\Http\Controllers\requestbarangController::class, 'approve_request'])->name('requestbarang.approve_request');
Route::get('/requestbarang/approve/{id}', [App\Http\Controllers\requestbarangController::class, 'approve_purchase'])->name('requestbarang.approve_purchase');
Route::get('/requestbarang/done/{id}', [App\Http\Controllers\requestbarangController::class, 'request_done'])->name('requestbarang.request_done');
Route::get('/requestbarangsall/{query?}', [App\Http\Controllers\requestbarangController::class, 'index_all'])->name('showAll')->where('query', '(.*)');

//Sales order
Route::resource('salesOrders', App\Http\Controllers\SalesOrderController::class);
Route::get('/salesOrdersAffari', [App\Http\Controllers\SalesOrderController::class, 'index_affari'])->name('salesOrder.affari');
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
Route::post('/salesOrders/deletelist', [App\Http\Controllers\ListOrderController::class, 'destroy'])->name('listOrder.delete');
Route::post('/salesOrders/deleteall/{uid}', [App\Http\Controllers\ListOrderController::class, 'destroyAll'])->name('listOrder.deleteAll');

//Search produk
Route::get('/search/{query?}', [App\Http\Controllers\SearchController::class, 'index'])->name('search')->where('query', '(.*)');
Route::get('/searchdata', [App\Http\Controllers\SearchController::class, 'data'])->name('searchdata');

//Lokasi produk
Route::get('/location', [App\Http\Controllers\LocationController::class, 'index'])->name('location');
Route::get('/location/denah', [App\Http\Controllers\LocationController::class, 'index_denah'])->name('denah');
Route::get('/location/search/barcode/{barcode}', [App\Http\Controllers\LocationController::class, 'search'])->where('barcode', '(.*)')->name('location.search');
Route::get('/location/search/lokasi/{lokasi}', [App\Http\Controllers\LocationController::class, 'searchs'])->name('location.searchs');
Route::get('/location/search/{barcode}', [App\Http\Controllers\LocationController::class, 'search'])->where('barcode', '(.*)');
Route::get('/location/{barcode}/edit', [App\Http\Controllers\LocationController::class, 'edit'])->name('location.edit')->where('barcode', '(.*)');
Route::post('/location/store', [App\Http\Controllers\LocationController::class, 'store'])->name('location.store');
Route::post('/location/update/{barcode}/{lokasi}', [App\Http\Controllers\LocationController::class, 'update'])->name('location.update')->where('barcode', '(.*)');
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

//Katalog
Route::resource('fileCatalogues', App\Http\Controllers\FileCatalogueController::class);
Route::get('fileCatalogues-daihatsu', [App\Http\Controllers\FileCatalogueController::class, 'index_daihatsu'])->name('fileCatalogues.index_daihatsu');
Route::get('fileCatalogues-isuzu', [App\Http\Controllers\FileCatalogueController::class, 'index_isuzu'])->name('fileCatalogues.index_isuzu');
Route::get('fileCatalogues-produkgenuine', [App\Http\Controllers\FileCatalogueController::class, 'index_genuine'])->name('fileCatalogues.index_produkgenuine');
Route::get('fileCatalogues-excel', [App\Http\Controllers\FileCatalogueController::class, 'index_excel'])->name('fileCatalogues.index_excel');
Route::get('produkgenuine-getdata', [App\Http\Controllers\FileCatalogueController::class, 'data'])->name('fileCatalogues.data_produkgenuine');
Route::get('produkgenuine-daihatsu', [App\Http\Controllers\ProdukCatalogueController::class, 'dataDaihatsu'])->name('fileCatalogues.dataDaihatsu');
Route::get('produkgenuine-ford', [App\Http\Controllers\ProdukCatalogueController::class, 'dataFord'])->name('fileCatalogues.dataFord');
Route::get('produkgenuine-hino', [App\Http\Controllers\ProdukCatalogueController::class, 'dataHino'])->name('fileCatalogues.dataHino');
Route::get('produkgenuine-honda', [App\Http\Controllers\ProdukCatalogueController::class, 'dataHonda'])->name('fileCatalogues.dataHonda');
Route::get('produkgenuine-mitsubishi', [App\Http\Controllers\ProdukCatalogueController::class, 'dataMitsubishi'])->name('fileCatalogues.dataMitsubishi');
Route::get('produkgenuine-isuzu', [App\Http\Controllers\ProdukCatalogueController::class, 'dataIsuzu'])->name('fileCatalogues.dataIsuzu');
Route::get('produkgenuine-suzuki', [App\Http\Controllers\ProdukCatalogueController::class, 'dataSuzuki'])->name('fileCatalogues.dataSuzuki');
Route::get('produkgenuine-toyota', [App\Http\Controllers\ProdukCatalogueController::class, 'dataToyota'])->name('fileCatalogues.dataToyota');
Route::get('/fileCatalogues/show/{id}', [App\Http\Controllers\FileCatalogueController::class, 'show'])->name('fileCatalogues.show');

//Service orders
Route::resource('serviceOrders', App\Http\Controllers\ServiceOrderController::class);
Route::post('/serviceOrders/put', [App\Http\Controllers\ServiceOrderController::class, 'putItemS'])->where('barcode', '(.*)')->name('serviceOrders.put');
Route::post('/serviceOrders/puts', [App\Http\Controllers\ServiceOrderController::class, 'putService'])->where('barcode', '(.*)')->name('serviceOrders.puts');
Route::post('/serviceOrders/updateData', [App\Http\Controllers\ServiceOrderController::class, 'updateDataS'])->name('serviceOrders.updateData');
Route::get('/getServicePdf/{id}', [App\Http\Controllers\ServiceOrderController::class, 'export_pdf'])->name('serviceOrders.getPdf')->where('id', '(.*)');
Route::get('/getServicePdfsimple/{id}', [App\Http\Controllers\ServiceOrderController::class, 'export_pdf_simple'])->name('serviceOrders.getPdfSimple')->where('id', '(.*)');
Route::get('serviceOrdersaffari', [App\Http\Controllers\ServiceOrderController::class, 'index_affari'])->name('serviceOrders.affari');
Route::get('serviceOrdersaffari/show/{id}', [App\Http\Controllers\ServiceOrderController::class, 'showAffari'])->name('serviceOrders.showaffari');
Route::get('/getserviceOrders/', [App\Http\Controllers\ServiceOrderController::class, 'load_produk'])->name('getserviceOrders');
Route::get('/getservicesOrders/', [App\Http\Controllers\ServiceOrderController::class, 'load_service'])->name('getservicesOrders');
Route::get('/getServiceExcel/{id}', [App\Http\Controllers\ServiceOrderController::class, 'export_excel'])->name('serviceOrders.export_excel')->where('id', '(.*)');
Route::get('/serviceOrders/{id}/{status}', [App\Http\Controllers\ServiceOrderController::class, 'editStatus'])->name('serviceOrders.editStatus');
Route::get('/serviceOrdersAffari/{id}/{status}', [App\Http\Controllers\ServiceOrderController::class, 'editStatusAffari'])->name('serviceOrders.editStatusAffari');
Route::get('/serviceOrder/approve/{id}', [App\Http\Controllers\ServiceOrderController::class, 'editApproval'])->name('serviceOrders.approve');
Route::get('/serviceOrderAffari/approve/{id}', [App\Http\Controllers\ServiceOrderController::class, 'editApprovalAffari'])->name('serviceOrders.approveAffari')->where('id', '(.*)');

//List order
Route::post('/listServiceOrders/deletelist', [App\Http\Controllers\ListServiceOrderController::class, 'destroy'])->name('listServiceOrder.delete');
Route::post('/listServiceOrders/deleteall/{uid}', [App\Http\Controllers\ListServiceOrderController::class, 'destroyAll'])->name('listServiceOrder.deleteAll');
