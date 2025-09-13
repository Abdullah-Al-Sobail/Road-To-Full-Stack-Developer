<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function login(){
        return view('layouts.backend.signin');
    }
    public function storeBrand(){
        return view('layouts.backend.brand.addBrand');
    }
    /**STORE BRAND DATA AND VALIDATE DATA */
    public function store(Request $request){


        $validationData = $request->validate([
            'brandName'=> 'required',
            'brandImage'=> 'required|image|mimes:png,jpg,jpeg,gif'
        ]);

        //Store image in storage directory
        // $path = $request->file('brandImage')->store('images','public');
        // return back();

        $fileName = time().'.'.$request->brandImage->extension();
        dd($fileName);


    }

}
