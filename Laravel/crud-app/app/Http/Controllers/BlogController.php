<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(){
    return view('backend.createPost');
   }
   public function allPost(){
    return view('backend.allPost');
   }
   public function validateData(Request $request ){
        // print_r($request->all());
        //dd($request->detail);
        // dd(auth()->user()->name);
        $request->validate(
            [
                'title' =>'required|max:10',
                'detail'=>'required'
            ],
            [
              'title.required'=>'Title must'
            ]
        );
        // $blogPost = Post::create(
        //     [
        //         'title'=> $request->title,
        //         'description'=> $request->detail,
        //         'created_by'=> auth()->user()->name,
        //     ]
        // );
        $blogPost = new Post;
        $blogPost->title = $request->title;
        $blogPost->description = $request->detail;
        $blogPost->created_by = auth()->user()->name;

        $blogPost->save();

        return redirect();
   }
}
