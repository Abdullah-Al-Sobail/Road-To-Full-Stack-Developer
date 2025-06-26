<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function blog(){
        return view('layouts.blogPage01');
    }
}
