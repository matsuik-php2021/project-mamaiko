<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Favorite;
use App\User;
use App\Hotel;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        // \Auth::user()->favorite_hotels()->attach($request->hotel_id);
        // return back();
        $id = Auth::id();
        $favorite = new \App\Favorite;
        $favorite->hotel_id = $request->hotel_id;
        $favorite->user_id = $id;
        $favorite->save();
        return back();
    }
    public function destroy(Request $request)
    {
        \Auth::user()->favorite_hotels()->detach($request->hotel_id);
        return back();
    }
    public function index()
    {
        // $query = Favorite::query();
        // $id = Auth::id();
        // $query->where('user_id', '=', $id);
        // $favorites = $query->get();
        // \Auth::user()->favorite_hotels()->orderBy('price', 'asc')->paginate(5);
        $favorite_hotels= Auth::user()->favorite_hotels()->get();
        return view('home.favoriteindex', [ 'favorites' => $favorite_hotels]);
    }
}
