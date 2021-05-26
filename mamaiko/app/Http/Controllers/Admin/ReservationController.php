<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::query()->where("checkin_date",">=",date("Y-m-d"))->get();
        return view('admin.reservation.index',['reservations'=>$reservations]);
    }

    public function show()
    {
        // $hotel = Hotel::find($id);
        // $plans = $hotel->plans()->get();
        // return view('admin.hotel.show',['hotel'=>$hotel,'plans'=>$plans]);
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.reservation.edit',['reservation'=>$reservation]);
    }

    public function update(Request $request)
    {
        $reservation = Reservation::where('id','=',$request->id)->get()[0];
        if($reservation==null){
            dd("ERROR : ユーザーが取得できませんでした。");
        }
        $reservation->update($request->all());
        $reservation->save();
        return redirect(route('admin.reservation.index'));
        // return redirect(route('admin.hotel.update',$user->id));
    }

}