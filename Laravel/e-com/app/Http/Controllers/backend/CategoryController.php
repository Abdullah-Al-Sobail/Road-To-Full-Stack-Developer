<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function addCategory(){
        $categories = Category::all();
        return view('layouts.backend.category.add',compact('categories'));
    }
    public function store(Request $request){
        $validationData = $request->validate([
            'categoryName'=> 'required',
            'categoryImage'=> 'image|mimes:png,jpg,jpeg,gif'
        ]);
        // dd($request->all());
        $category = new Category();

        // dd($categoryImageName);

        $category->category_name = $request->categoryName;
        $category->slug = $request->slug;
        if($request->hasFile('categoryImage')){
            $categoryImageName = "category-".$request->slug.".".$request->categoryImage->extension();
            $imagepath = $request->categoryImage->move(public_path('storage/categories'),$categoryImageName);
            $category->category_image = $categoryImageName;
            $category->category_image_url = url('/storage/categories/'.$categoryImageName);
        }
        $category->save();
        return back();
    }

    public function edit(Request $request,Category $editCategory){
        $categories = Category::all();
        return view('layouts.backend.category.add',compact('categories','editCategory'));
    }

    public function update(Request $request,Category $updateCategory){
        $request->validate([
            'categoryName'=>'required',
            'slug'=>'required',
        ]);
    }
}
