<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Plan;
use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function toppage()
    {
        return view('toppage');
    }
    public function index(Request $request)
    {
        // $hotel_name=$request->hotel_name;
        $price1=$request->input('price1');
        $price2=$request->input('price2');
        $people=$request->input('people');

        $query=Plan::query(); 
        // $query->leftJoin('hotels', 'plans.hotel_id', '=', 'hotels.id');
         if (!empty($hotel_name)){
             $query->where('name', 'LIKE', "%{$hotel_name}%" );
         }
        // ホテルテーブルからホテル名を持ってきたい
        if (!empty($price1)){
            $query->where('price', '>=', $price1 );
        }
        if (!empty($price2)){
            $query->where('price', '<=', $price2);
        }
        if (!empty($people)){
            $query->where('people', '=', $people );
        }
        $searches=$query->orderBy('price', 'asc')->paginate(5);
        return view('search_results', ['searches'=> $searches ]);
    }
    public function planshow(Request $request, $id)
    {
        $plan = Plan::find($id);
        return view("planshow", ["plan" => $plan]);

    }
    public function hotelshow(Request $request, $id)
    {
        $hotel = Hotel::find($id);
        $plans = $hotel->plans()->get();
        return view("hotelshow", ["hotel" => $hotel, "plans" => $plans]);
    }

}