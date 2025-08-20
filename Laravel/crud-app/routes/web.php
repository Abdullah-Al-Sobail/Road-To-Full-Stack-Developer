<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontendController::class,'showData'])->name('frontend.landingPage');
Route::get('/post-view/{id}',[FrontendController::class,'viewPost'])->name('frontend.viewPost');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add-post',[BlogController::class,'store'])->name('blog.post');
Route::get('/all-post',[BlogController::class,'allPost'])->name('blog.allPost');
Route::POST('/add-post',[BlogController::class,'validateData'])->name('blog.validate');
Route::get('/update-status/{id}',[BlogController::class,'updateStatus'])->name('blog.status');
Route::get('/edit-blog/{id}',[BlogController::class,'editBlog'])->name('blog.edit');
Route::PUT('/update-blog/{id}',[BlogController::class,'updateBlog'])->name('blog.update');
Route::delete('/posts/{id}',[BlogController::class,'destroy'])->name('posts.delete');

