<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function create($id)
    {
        return view('admin.plan.create',["hotel_id"=>$id]);
    }

    public function store(Request $request)
    {
        $plan = new Plan;
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required',
            'price' => 'required|integer|min:1',
            'room_count' => 'required|integer|min:1',
            'people' => 'required|integer|min:1',
        ]);
        $plan->name = $request->name;
        $plan->description = $request->description;
        $plan->price = $request->price;
        $plan->room_count = $request->room_count;
        $plan->people = $request->people;
        $plan->hotel_id = $request->hotel_id;
        $plan->save();
        return redirect(route('admin.hotel.show',$request->hotel_id));
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
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required',
            'price' => 'required|integer|min:1',
            'room_count' => 'required|integer|min:1',
            'people' => 'required|integer|min:1',
        ]);
        $plan->update($request->all());
        $plan->save();
        return redirect(route('admin.hotel.show',$request->hotel_id));
        // return redirect(route('admin.plan.update',$user->id));
    }
}
