<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function product(){
        $brands = Brand::select('id','brand_name')->get();
        // $categories = ;
        return view('layouts.backend.product.addProduct',compact('brands','categories'));
    }
      public function viewProduct($slug){
        return view('layouts.frontend.productView');
    }
    public function fetchSubCategory($id){
       $subCategories = SubCategory::where('category_id',$id)->select('id','sub_category_name')->get();

       if(count($subCategories)>0){
            return $subCategories;
       }else{
            return 'No Sub Category found!';
       }
    }
    public function store(Request $request){
        $product_image = $this->product_img_store($request);

        $product = new Product();

        $product->title = $request->title;
        $product->slug = str($request->title)->slug();
        $product->brand_id = $request->brand_id;

        $product->category_id = $request->category;
        $product->sub_category_id = $request->subCategory;
        $product->price = $request->price;
        $product->discount = $request->discount_price;
        $product->status = $request->stock_status;
        $product->product_code = $request->product_code;
        $product->campain_start = $request->campain_starts;
        $product->campain_end = $request->campain_ends;
        $product->short_description = $request->short_des;
        $product->long_description = $request->long_des;
        $product->product_image_name= $product_image['product_image_name'];
        $product->product_image_url = $product_image['product_image_url'];
        $product->product_video_url = $request->product_video;
        $product->save();
        $productID = $product->id;
        $this->gellary_images_store($request,$productID);
        return back();

    }
    public function product_img_store($request){
         //PRODUCT IMAGE PROCESSING
        $extension  = $request->product_image->extension();
        $product_img_name = str($request->title)->slug()."-product.".$extension;
        // $product_img_path = $request->file('product_image')->storeAs('product',$product_img_name,'public');
         $product_img_path = $request->product_image->move(public_path('storage/products'),$product_img_name);
        $product_url = url('storage/products/'.$product_img_name);

        return [
            'product_image_name'=>$product_img_name,
            'product_image_url'=>$product_url
        ];
        // dd($product_img_path);
    }
    //Gellary Image Processing
    public function gellary_images_store($request,$productID){

          foreach($request->product_gallery_images as $product_gallery_image){
             $extension  = $product_gallery_image->extension();
            $product_gallery_img_name = str($request->title)->slug().uniqid()."-product.".$extension;
        // $product_img_path = $request->file('product_image')->storeAs('product',$product_img_name,'public');
        $product_img_path = $product_gallery_image->move(public_path('storage/products'),$product_gallery_img_name );
        $product_gallery_url = url('storage/products/'.$product_gallery_img_name);
         $images  = new Image();
        $images->product_id = $productID;
        $images->image_name = $product_gallery_img_name;
        $images->image_url = $product_gallery_url;
        $images->save();


    }
    }
}
