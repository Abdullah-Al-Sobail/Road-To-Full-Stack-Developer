<?php

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
