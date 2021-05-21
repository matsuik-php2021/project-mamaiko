<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // dd("test");
        return view('home/index');
    }

    public function mypage()
    {
        return view('home/mypage');
    }

    public function update(){
        return view('home/update');
    }
}
