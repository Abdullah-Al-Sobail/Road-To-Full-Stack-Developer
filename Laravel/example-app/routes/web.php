<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast\String_;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home',function(){
//     return view('login');
// });
// Route::get('/home/post/{id?}/{text?}',function(?String $id=null,?String $text=null){
//     if($id){

//         return "The post number is :".$id."the text is ".$text;
//     }else{
//         return "<h1>No Post Found</h1>";
//     }
// })->whereNumber('id')->whereIn('text',['newpost','oldpost','currentpost']);
//Route::view('/post','post');

Route::get('/about-me/{id}',function(){
    return view('layouts.about');
})->name('about');
Route::redirect('/about','/about-me');

Route::fallback(function(){
    return "<h1>No pages found !</h1>";
});