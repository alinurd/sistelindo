<?php

use App\Http\Controllers\Admin\Master\BannerController;
use App\Http\Controllers\Admin\Master\CompanyController;
use App\Http\Controllers\Admin\Master\CustomerController;
use App\Http\Controllers\Admin\Master\FacilityController;
use App\Http\Controllers\Admin\Master\GalleryController;
use App\Http\Controllers\Admin\Master\IsoController;
use App\Http\Controllers\Admin\Master\LineController;
use App\Http\Controllers\Admin\Master\PageDetailController;
use App\Http\Controllers\Admin\Master\ProductController;
use Illuminate\Support\Facades\Route;

// prefix name route = admin.
Route::prefix('/master')->name('master.')->group(function () {

     // ==== page-detail Routes ====
    Route::prefix('/page-detail')->name('page-detail.')->group(function () {
        $localClass = PageDetailController::class;
        Route::get('/', [$localClass, 'index'])->name('index');
        Route::get('/edit/{id}', [$localClass, 'edit'])->name('edit');
        Route::post('/submit', [$localClass, 'create'])->name('create');
        Route::get('/delete/{id}', [$localClass, 'delete'])->name('delete');
        Route::get('/multidelete', [$localClass, 'multi_delete'])->name('multi_delete');
        Route::get('/status/{id}', [$localClass, 'editstatus'])->name('status');
    });
     
    // ==== facility Routes ====
    Route::prefix('/facility')->name('facility.')->group(function () {
        $localClass = FacilityController::class;
        Route::get('/', [$localClass, 'index'])->name('index');
        Route::get('/edit/{id}', [$localClass, 'edit'])->name('edit');
        Route::post('/submit', [$localClass, 'create'])->name('create');
        Route::get('/delete/{id}', [$localClass, 'delete'])->name('delete');
        Route::get('/multidelete', [$localClass, 'multi_delete'])->name('multi_delete');
        Route::get('/status/{id}', [$localClass, 'editstatus'])->name('status');
    });
    
    // ==== banner Routes ====
    Route::prefix('/banner')->name('banner.')->group(function () {
        $localClass = BannerController::class;
        Route::get('/', [$localClass, 'index'])->name('index');
        Route::get('/edit/{id}', [$localClass, 'edit'])->name('edit');
        Route::post('/submit', [$localClass, 'create'])->name('create');
        Route::get('/delete/{id}', [$localClass, 'delete'])->name('delete');
        Route::get('/multidelete', [$localClass, 'multi_delete'])->name('multi_delete');
        Route::get('/status/{id}', [$localClass, 'editstatus'])->name('status');
    });
     
    
    // ==== customer Routes ====
    Route::prefix('/customer')->name('customer.')->group(function () {
        $localClass = CustomerController::class;
        Route::get('/', [$localClass, 'index'])->name('index');
        Route::get('/edit/{id}', [$localClass, 'edit'])->name('edit');
        Route::post('/submit', [$localClass, 'create'])->name('create');
        Route::get('/delete/{id}', [$localClass, 'delete'])->name('delete');
        Route::get('/multidelete', [$localClass, 'multi_delete'])->name('multi_delete');
        Route::get('/status/{id}', [$localClass, 'editstatus'])->name('status');
    });
    
    // ==== gallery Routes ====
    Route::prefix('/gallery')->name('gallery.')->group(function () {
        $localClass = GalleryController::class;
        Route::get('/', [$localClass, 'index'])->name('index');
        Route::get('/edit/{id}', [$localClass, 'edit'])->name('edit');
        Route::post('/submit', [$localClass, 'create'])->name('create');
        Route::get('/delete/{id}', [$localClass, 'delete'])->name('delete');
        Route::get('/multidelete', [$localClass, 'multi_delete'])->name('multi_delete');
        Route::get('/status/{id}', [$localClass, 'editstatus'])->name('status');
        Route::get('/delete-media/{id}', [$localClass, 'deleteMedia'])->name('delete_media');
        
        
    });
    
    // ==== customer Routes ====
    Route::prefix('/product')->name('product.')->group(function () {
        $localClass = ProductController::class;
        Route::get('/', [$localClass, 'index'])->name('index');
        Route::get('/edit/{id}', [$localClass, 'edit'])->name('edit');
        Route::post('/submit', [$localClass, 'create'])->name('create');
        Route::get('/delete/{id}', [$localClass, 'delete'])->name('delete');
        Route::get('/multidelete', [$localClass, 'multi_delete'])->name('multi_delete');
        Route::get('/status/{id}', [$localClass, 'editstatus'])->name('status');
    });

    // ==== line Routes ====
    Route::prefix('/line')->name('line.')->group(function () {
        $localClass = LineController::class;
        Route::get('/', [$localClass, 'index'])->name('index');
        Route::get('/edit/{id}', [$localClass, 'edit'])->name('edit');
        Route::post('/submit', [$localClass, 'create'])->name('create');
        Route::get('/delete/{id}', [$localClass, 'delete'])->name('delete');
        Route::get('/multidelete', [$localClass, 'multi_delete'])->name('multi_delete');
        Route::get('/status/{id}', [$localClass, 'editstatus'])->name('status');
    });
    // ==== iso Routes ====
    Route::prefix('/iso')->name('iso.')->group(function () {
        $localClass = IsoController::class;
        Route::get('/', [$localClass, 'index'])->name('index');
        Route::get('/edit/{id}', [$localClass, 'edit'])->name('edit');
        Route::post('/submit', [$localClass, 'create'])->name('create');
        Route::get('/delete/{id}', [$localClass, 'delete'])->name('delete');
        Route::get('/multidelete', [$localClass, 'multi_delete'])->name('multi_delete');
        Route::get('/status/{id}', [$localClass, 'editstatus'])->name('status');
    });
    
    // ==== iso Routes ====
    Route::prefix('/company')->name('company.')->group(function () {
        $localClass = CompanyController::class;
        Route::get('/', [$localClass, 'index'])->name('index');
        Route::get('/edit/{id}', [$localClass, 'edit'])->name('edit');
        Route::post('/submit', [$localClass, 'create'])->name('create');
        Route::get('/delete/{id}', [$localClass, 'delete'])->name('delete');
        Route::get('/multidelete', [$localClass, 'multi_delete'])->name('multi_delete');
        Route::get('/status/{id}', [$localClass, 'editstatus'])->name('status');
    });
    
});