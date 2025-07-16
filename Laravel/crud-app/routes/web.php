<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add-post',[BlogController::class,'store'])->name('blog.post');
Route::get('/all-post',[BlogController::class,'allPost'])->name('blog.allPost');
Route::POST('/add-post',[BlogController::class,'validateData'])->name('blog.validate');
