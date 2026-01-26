<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\frontend\FrontendController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home-page',[FrontendController::class,'homepage'])->name('frontend.homePage');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('add-brand',[BackendController::class,'storeBrand'])->name('brand.add');
Route::post('add-new-brand',[BackendController::class,'store',])->name('brand.addItem');
Route::get('edit-brand/{editBrand:slug}',[BackendController::class,'editBrand'])->name('brand.edit');
Route::put('update-brand/{brand:slug}',[BackendController::class,'updateBrand'])->name('brand.update');
Route::delete('/delete-brand/{brand:slug}',[BackendController::class,'deleteBrand'])->name('delete.brand');


//catgory
Route::get('/add-category',[CategoryController::class,'addCategory'])->name('category.add');
Route::post('/store-category',[CategoryController::class,'store'])->name('category.store');
Route::get('/edit-category/{editCategory:slug}',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/update-category/{updateCategory:slug}',[CategoryController::class,'update'])->name('category.update');
Route::delete('/delete-category/{deleteCategory:slug}',[CategoryController::class,'delete'])->name('category.delete');


//Sub Category
Route::get('add-sub-category',[CategoryController::class,'subCategory'])->name('subCategory.view');
Route::post('store-sub-category',[CategoryController::class,'subCategoryStore'])->name('subCategory.store');
Route::get('edit-sub-category/{editSubCategory:slug}',[CategoryController::class,'editSubCategory'])->name('subCategory.edit');


//Front-end
Route::get('/home-page',[FrontendController::class,'homepage'])->name('homepage');

//Product
Route::get('add-prodcut',[ProductController::class,'product'])->name('product.add');
Route::get('fetch-sub-category/{id}',[ProductController::class,'fetchSubCategory'])->name('fetch.subCategory');
Route::POST('store-product',[ProductController::class,'store'])->name('product.store');
