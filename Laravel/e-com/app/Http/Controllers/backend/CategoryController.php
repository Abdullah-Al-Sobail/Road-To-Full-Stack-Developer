<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

         //*File exists or not
         $path ="categories/".$updateCategory->category_image;

        if(Storage::disk('public')->exists($path)){
            if($request->hasFile('categoryImage')){
            Storage::disk('public')->delete($path);
        // dd($categoryImageName);
            $updateCategory->category_name = $request->categoryName;
            $updateCategory->slug = $request->slug;
            $categoryImageName = "category-".$request->slug.".".$request->categoryImage->extension();
            $imagepath = $request->categoryImage->move(public_path('storage/categories'),$categoryImageName);
            $updateCategory->category_image = $categoryImageName;
            $updateCategory->category_image_url = url('/storage/categories/'.$categoryImageName);
            $updateCategory->save();
            return redirect()->route('category.add');
            }else{
            $updateCategory->category_name = $request->categoryName;
            $updateCategory->slug = $request->slug;
            if($request->hasFile('categoryimage')){
            $categoryImageName = "category-".$request->slug.".".$request->categoryImage->extension();
            $imagepath = $request->categoryImage->move(public_path('storage/categories'),$categoryImageName);
            $updateCategory->category_image = $categoryImageName;
            $updateCategory->category_image_url = url('/storage/categories/'.$categoryImageName);
            }
            $updateCategory->save();
            return redirect()->route('category.add');
            }

        }
    }
     public function delete(Category $deleteCategory){

     $path ="categories/".$deleteCategory->category_image;
     $isDelete = Storage::disk('public')->delete($path);
     if($isDelete){
        $deleteCategory->delete();
       return redirect()->route('category.add');
     }
     return redirect()->route('category.add');
    }

    //**
    // Sub Category Start
    // */

    public function mainCategory(){
        $categories = Category::select('id','category_name')->get();
        return view('layouts.backend.category.subCategory',compact('categories'));
    }
    public function subCategoryStore(Request $request){
        $request->validate([
            'subCategoryName'=> 'required',
            'slug'=>'required'
        ]);

        $subCategories = new SubCategory();
        $subCategories->sub_category_name = $request->subCategoryName;
        $subCategories->slug = $request->slug;
        $subCategories->category = $request->parent_category;
        $subCategories->category_id = $request->parent_category;
        if($request->hasFile('subCategoryImage')){
            $subCategoryImageName = "subCategory-".$request->slug.".".$request->subCategoryImage->extension();
            $imagepath = $request->subCategoryImage->move(public_path('storage/categories'),$subCategoryImageName);
            $subCategories->image_name = $subCategoryImageName;
            $subCategories->image_url = url('/storage/categories/'.$subCategoryImageName);
        }
        $subCategories->save();
        return back();

    }
    public function subCategory(){
        $categories = Category::all();
        $subCategories = SubCategory::select('id','sub_category_name','slug','image_url')->get();
        return view('layouts.backend.category.subCategory',compact('categories','subCategories'));
    }

    public function editSubCategory(Request $request,SubCategory $editSubCategory){
        //  $request->validate([
        //     'subCategoryName'=> 'required',
        //     'slug'=>'required'
        // ]);

        $categories = Category::all();

        $subCategories = SubCategory::select('id','sub_category_name','slug','image_url')->get();
        // dd( $subCategories);
        return view('layouts.backend.category.subCategory',compact('categories','subCategories','editSubCategory'));
    }





}
