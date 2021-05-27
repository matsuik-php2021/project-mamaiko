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
        $nowdatetime = date("Y-m-d");
        $myEmail = $request->email;
        $myTel = $request->tel;
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,'.$myEmail.',email',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
            'tel' => 'required |  regex:/^[0-9]+$/ | digits_between:8,11|unique:users,tel,'.$myTel.',tel',
            'birthday' => 'required|date|before:'.$nowdatetime,
        ]);
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

    public function destroy()
    {       
        $user = User::where('id','=',\Auth::id())->get()[0];
        $user->delete();
        return redirect(route('home'));
    }
}
