<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function addCategory(){
        return view('layouts.backend.category.add');
    }
    public function store(Request $request){

        $validationData = $request->validate([
            'categoryName'=> 'required',
            'categoryImage'=> 'required|image|mimes:png,jpg,jpeg,gif'
        ]);
    }
}
