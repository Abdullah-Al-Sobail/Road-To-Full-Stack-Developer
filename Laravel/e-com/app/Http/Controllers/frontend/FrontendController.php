<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function homepage(){
        $categories = Category::with('subCategory','product')->get();
        // $products  = Product::paginate(2);
        // dd( $products );
    // dd($categories);
        return view('layouts.frontend.products',compact('categories'));
    }
}
