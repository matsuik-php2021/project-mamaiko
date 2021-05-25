<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Favorite;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        \Auth::user()->favorite_hotels()->attach($request->hotel_id);
        return back();
    }
    public function destroy(Request $request)
    {
        \Auth::user()->favorite_hotels()->detach($request->hotel_id);
        return back();
    }
    public function index()
    {
        $hotels = \Auth::user()->favorite_hotels()->orderBy('price', 'asc')->paginate(5);
        return view('home/favoriteindex', [ 'hotels' => $hotels]);
    }
}
