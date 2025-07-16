<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // dd($request->all());
        $request->validate(
            [
                'title' =>'required|max:10',
                'detail'=>'required'
            ],
            [
              'title.required'=>'Title must'
            ]
        );
   }
}
