<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    /**STORE BRAND DATA AND VALIDATE DATA */
    public function store(Request $request){


        $validationData = $request->validate([
            'brandName'=> 'required',
            'brandImage'=> 'required|image|mimes:png,jpg,jpeg,gif'
        ]);
        // dd($request->brandImage);
        //Store image in storage directory
        // $path = $request->file('brandImage')->store('images','public');
        $imageData = $this->storeImage($request);
        // insert brand

        $brand = new Brand();

        $this->dataUpdate($request,$brand,$imageData);
        return back();

        // $fileName = time().'.'.$request->brandImage->extension();
        // dd($fileName);


    }

    public function storeBrand(){
        $brands = Brand::all();
        return view('layouts.backend.brand.addBrand',compact('brands'));
    }

    public function editBrand(Request $request,Brand $editBrand){
         $brands = Brand::all();
        // dd($editBrand);
        return view('layouts.backend.brand.addBrand',compact('brands','editBrand'));
    }
    public function updateBrand(Request $request,Brand $brand){
        // dd($request->all());
        $validation =  $request->validate([
            'brandName' => 'required',
            'slug' => 'required'
        ]);
        //*File exists or not
        $path ="images/".$brand->brand_image;
        // echo $path;
        if(Storage::disk('public')->exists($path)){
            if($request->hasFile('brandImage')){
            Storage::disk('public')->delete($path);
            $imageData = $this->storeImage($request);
            $this->dataUpdate($request,$brand, $imageData );
            return back();
            }else{
            $this->dataUpdate($request,$brand);
            return back();
            }

        }else{
            $imageData = $this->storeImage($request);
            $this->dataUpdate($request,$brand, $imageData );
            return back();
        }
    }


    //Refactor code
    public function storeImage($request){
        $filename = time().$request->slug.".".$request->brandImage->extension();
        $storeImage = $request->brandImage->move(public_path('storage/images'),$filename);
        return ['filename'=>$filename,'storeImage'=>$storeImage];
    }
    public function dataUpdate($request,$brand,$imageData=[]){
        $brand->brand_name = $request->brandName;
        $brand->slug = $request->slug;
       if($request->hasFile('brandImage')){
        $brand->brand_image = $imageData['filename'];
        $brand->image_url = url('storage/images/'. $imageData['filename']);
       }
        $brand->brand_name = $request->brandName;
        $brand->save();

    }
    public function deleteBrand(Brand $brand){
    //    dd($brand);
    // return 'Hello';
    // $brand->delete();
    // return redirect()->route('brand.add');
     $path ="images/".$brand->brand_image;
     $isDelete = Storage::disk('public')->delete($path);
     if($isDelete){
        $brand->delete();
       return redirect()->route('brand.add');
     }
    }

}
