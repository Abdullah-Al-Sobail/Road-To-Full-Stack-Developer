<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
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
    $blogPosts = Post::all();
    // dd($blogPosts);
    return view('backend.allPost',compact('blogPosts'));
   }
   public function validateData(Request $request ){
        //dd(Str::slug('Hello WORLD'));
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
        $blogPost->slug = Str::slug($request->title);
        $blogPost->description = $request->detail;
        $blogPost->created_by = auth()->user()->name;

        $blogPost->save();

        return back()->with('success','Post Inserted Successfully!');
   }
   public function updateStatus($id){
    // return $id;
    $statusUpdate = Post::find($id);
    // dd($statusUpdate);
    if($statusUpdate->status == true){
       $statusUpdate->status = false;
    }else{
        $statusUpdate->status =true;
    }
    $statusUpdate->save();
    return back();
   }
}
