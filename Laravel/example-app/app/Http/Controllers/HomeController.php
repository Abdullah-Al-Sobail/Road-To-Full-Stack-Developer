<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about(){
        $name = "Laravel";
        return view('about',['name'=>$name]);
    }
}
