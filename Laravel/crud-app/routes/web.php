<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add-post',function(){
    return view('backend.createPost');
})->name('blog.post');
Route::get('/all-post',function(){
    return view('backend.allPost');
})->name('blog.allPost');
