<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function homepage(){
        $categories = Category::with('subCategory')->get();
        // dd($categories);
        return view('layouts.frontend.forntendApp',compact('categories'));
    }
}
