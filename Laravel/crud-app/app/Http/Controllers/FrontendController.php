<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function showData(){
        $posts = Post::select(['id','title','slug','description','created_by','view'])->where('status',true)->get();
        // dd($posts);
        return view('welcome',compact('posts'));
   }
   public function viewPost(Post $post){

    return view('frontend.blog.post',compact('post'));
   }
}
