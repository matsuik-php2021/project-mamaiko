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
        $price_min=$request->input('price_min');
        $price_max=$request->input('price_max');
        $people=$request->input('people');

        $query=Plan::query(); 
        // $query->leftJoin('hotels', 'plans.hotel_id', '=', 'hotels.id');
         if (!empty($hotel_name)){
             $query->where('name', 'LIKE', "%{$hotel_name}%" );
         }
        // ホテルテーブルからホテル名を持ってきたい
        if (!empty($price_min)){
            //validate
            $this->validate($request, ['price_min' => 'integer|min:1']);
            $query->where('price', '>=', $price_min );
        }
        if (!empty($price_max)){
            //validate
            $this->validate($request, ['price_max' => 'integer|min:1']);
            $query->where('price', '<=', $price_max);
        }
        if (!empty($people)){
            //validate
            $this->validate($request, ['people' => 'integer|min:1']);
            $query->where('people', '>=', $people );
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