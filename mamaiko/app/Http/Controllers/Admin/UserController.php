<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->get();
        return view('admin.user.index',['users'=>$users]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    public function update(Request $request)
    {
        $user = User::where('id','=',$request->id)->get()[0];
        if($user==null){
            dd("ERROR : ユーザーが取得できませんでした。");
        }
        $today = date("Y-m-d");
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
            'tel' => 'required |  regex:/^[0-9]+$/ | digits_between:8,11|unique:users',
            'birthday' => 'required|date|before:'.$today,
        ]);
        $user->update($request->all());
        $user->save();
        return redirect(route('admin.user.index'));
        // return redirect(route('admin.user.update',$user->id));
    }

}