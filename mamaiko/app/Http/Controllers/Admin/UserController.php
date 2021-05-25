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

    public function update($id)
    {
        $user = User::find($id);
        return view('admin.user.update',['user'=>$user]);
    }

    public function store(Request $request)
    {
        $user = User::where('id','=',$request->id)->get()[0];
        if($user==null){
            dd("ERROR : ユーザーが取得できませんでした。");
        }
        $user->update($request->all());
        $user->save();
        return redirect(route('admin.user.index'));
        // return redirect(route('admin.user.update',$user->id));
    }

}