<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Plan;
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
        // if (!empty($hotel_name)){
        //     $query->where('name', 'LIKE', "%{$hotel_name}%" );
        // }
        if (!empty($price1)){
            $query->where('price', '>=', $price1 );
        }
        if (!empty($price2)){
            $query->where('price', '<=', $price2);
        }
        if (!empty($people)){
            $query->where('people', '=', $people );
        }
        $searches=$query->paginate(5);
        return view('search_results', ['searches'=> $searches]);
    }
}