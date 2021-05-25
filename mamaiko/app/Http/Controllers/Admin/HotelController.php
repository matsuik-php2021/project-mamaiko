<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::query()->paginate(5);
        return view('admin.hotel.index',['hotels'=>$hotels]);
    }

    public function create()
    {
        $categories=\App\Category::all();
        return view('admin.hotel.create',['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->category_id = $request->category_id;
        $hotel->address = $request->address;
        $hotel->access = $request->access;
        $hotel->description = $request->description;
        $hotel->checkin_time = $request->checkin_time;
        $hotel->checkout_time = $request->checkout_time;
        $hotel->save();
        return redirect(route('admin.hotel.index'));
        // return redirect(route('admin.hotel.update',$user->id));
    }

    public function edit($id)
    {
        $hotel = Hotel::find($id);
        $categories=\App\Category::all();
        return view('admin.hotel.edit',['hotel'=>$hotel,'categories'=>$categories]);
    }

    public function update(Request $request)
    {
        $hotel = Hotel::where('id','=',$request->id)->get()[0];
        if($hotel==null){
            dd("ERROR : ユーザーが取得できませんでした。");
        }
        $hotel->update($request->all());
        $hotel->save();
        return redirect(route('admin.hotel.index'));
        // return redirect(route('admin.hotel.update',$user->id));
    }

}