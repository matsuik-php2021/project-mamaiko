<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $users = Hotel::query()->get();
        return view('admin.user.index',['users'=>$users]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    public function update(Request $request)
    {
        $hotel = User::where('id','=',$request->id)->get()[0];
        if($hotel==null){
            dd("ERROR : ユーザーが取得できませんでした。");
        }
        $hotel->update($request->all());
        $hotel->save();
        return redirect(route('admin.hotel.index'));
        // return redirect(route('admin.user.update',$user->id));
    }

}