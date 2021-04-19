<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\SizeController;

// Route::get('/about', [TestController::class, 'about']);
// Route::get('/contact', [TestController::class, 'contact'])->name('contact');

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');


// ALL BACKEND ROUTES

Route::prefix('admin')->group(function (){

    // ALL CATEGORY ROUTES HERE
    Route::prefix('category')->group(function (){
        Route::get('/index',[CategoryController::class, 'index'])->name('category.index');
        Route::get('/create',[CategoryController::class, 'create'])->name('category.create');
        Route::post('/store',[CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}',[CategoryController::class, 'update'])->name('category.update');
        Route::get('/destroy/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/inactive/{id}',[CategoryController::class, 'inactive'])->name('category.inactive');
        Route::get('/active/{id}',[CategoryController::class, 'active'])->name('category.active');
    });

    // ALL SUB-CATEGORY ROUTES HERE
    Route::prefix('subcategory')->group(function () {
        Route::get('/index', [SubcategoryController::class, 'index'])->name('subcategory.index');
        Route::get('/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
        Route::post('/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/inactive/{id}', [SubcategoryController::class, 'inactive'])->name('subcategory.inactive');
        Route::get('/active/{id}', [SubcategoryController::class, 'active'])->name('subcategory.active');
        Route::get('/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
        Route::post('/update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');
        Route::get('/destroy/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.destroy');
    });

    // ALL BRAND ROUTES HERE
    Route::prefix('brand')->group(function () {
        Route::get('/index', [BrandController::class, 'index'])->name('brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
        Route::get('/inactive/{id}', [BrandController::class, 'inactive'])->name('brand.inactive');
        Route::get('/active/{id}', [BrandController::class, 'active'])->name('brand.active');
    });

    // ALL COLOR ROUTES HERE
    Route::prefix('/color')->group(function () {
        Route::get('/index', [ColorController::class, 'index'])->name('color.index');
        Route::get('/create', [ColorController::class, 'create'])->name('color.create');
        Route::post('/store', [ColorController::class, 'store'])->name('color.store');
        Route::get('/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
        Route::post('/update/{id}', [ColorController::class, 'update'])->name('color.update');
        Route::get('/destroy/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
    });

    // ALL SIZE ROUTES HERE
    Route::prefix('size')->group(function () {
        Route::get('/index', [SizeController::class, 'index'])->name('size.index');
        Route::get('/create', [SizeController::class, 'create'])->name('size.create');
        Route::post('/store', [SizeController::class, 'store'])->name('size.store');
        Route::get('/edit/{id}', [SizeController::class, 'edit'])->name('size.edit');
        Route::post('/update/{id}', [SizeController::class, 'update'])->name('size.update');
        Route::get('/destroy/{id}', [SizeController::class, 'destroy'])->name('size.destroy');
    });

});
