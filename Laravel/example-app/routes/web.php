<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast\String_;

Route::get('/', function () {
    $title = "welcome page";
    return view('welcome',['title'=>$title]);
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

Route::get('/about-me',function(){
    return view('layouts.about');
})->name('about');
Route::redirect('/about','/about-me');

Route::get('/navbar',function(){
    return view('layouts.navbar');
});
Route::get('/services',function(){
    return view('layouts.services');
});

Route::get('/masterLayout',function(){
    return view('layouts.master_layouts');
});
Route::get('/blogPage01',[HomeController::class,'blog']);
Route::get('/blogPage02',function(){
    return view('layouts.blogPage02');
});
Route::get('/blogPage03',function(){
    return view('layouts.blogPage03');
});
Route::get('/invok',TestController::class);






Route::fallback(function(){
    return "<h1>No pages found !</h1>";
});
