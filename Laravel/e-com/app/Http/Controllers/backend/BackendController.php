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
}
