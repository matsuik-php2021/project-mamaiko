<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function create()
    {
        $categories=\App\Category::all();
        return view('admin.plan.create',['categories'=>$categories]);
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
        return redirect(route('admin.plan.index'));
        // return redirect(route('admin.plan.update',$user->id));
    }

    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('admin.plan.edit',['plan'=>$plan]);
    }

    public function update(Request $request)
    {
        $plan = Plan::where('id','=',$request->id)->get()[0];
        if($plan==null){
            dd("ERROR : ユーザーが取得できませんでした。");
        }
        $plan->update($request->all());
        $plan->save();
        return redirect(route('admin.hotel.show',$request->hotel_id));
        // return redirect(route('admin.plan.update',$user->id));
    }
}
