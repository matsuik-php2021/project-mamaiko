<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

    public function confirm(Request $request)
    {
        // dd($request);
        return view('home/confirm', ['user' => $request]);
    }

    public function store(Request $request)
    {
        $user = User::where('id','=',\Auth::id())->get()[0];
        if($user==null){
            dd("ERROR : ユーザーが取得できませんでした。");
        }
        $user->update($request->all());
        $user->save();
        return redirect(route('mypage'));
    }

    public function withdraw()
    {
        return view('home/withdraw');
    }
}
