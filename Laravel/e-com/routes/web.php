<?php

use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login',[BackendController::class,'login'])->name('backend.signin');

Route::get('add-brand',[BackendController::class,'storeBrand'])->name('brand.add');
Route::post('add-new-brand',[BackendController::class,'store'])->name('brand.addItem');
