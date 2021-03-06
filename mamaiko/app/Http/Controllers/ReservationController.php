<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Validator;
use Illuminate\validation;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $plan = \App\Plan::find($id);
        return view('reservation.create',['plan'=>$plan]);
    }


    public function confirm(Request $request)
    {
        $plan = \App\Plan::find($request->plan_id);
        $today = date("Y-m-d");
        $this->validate($request, [
            'room_count' => 'required|integer|min:1|max:5',
            'checkin_date' => 'required|date|after:'.$today,
            'checkout_date' => 'required|date|after:'.$request->checkin_date,
        ]);
        if (!$plan->can_reserve_in($request->room_count,$request->checkin_date,$request->checkout_date)){
            return redirect(route('reservation.create',$request->plan_id))->with('message', "予約が埋まっています。");
        }
        return view('reservation.confirm',['plan'=>$plan,'request'=>$request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = new \App\Reservation;
        $reservation->hotel_id = $request->hotel_id;
        $reservation->plan_id = $request->plan_id;
        $reservation->user_id = $request->user_id;
        $reservation->checkin_date = $request->checkin_date;
        $reservation->checkout_date = $request->checkout_date;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->room_count = $request->room_count;
        $reservation->save();
        return view('reservation.complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_history()
    {
        $id = Auth::id();
        $nowdatetime = date("Y-m-d");
        $query = Reservation::query();
        $query->where("user_id", "=", $id);
        $query->where("checkout_date", "<=", $nowdatetime);
        $reservations = $query->get();
        return view("home.reservationhistory", ["reservations" => $reservations]);
    }
    public function show_plan()
    {
        $id = Auth::id();
        $nowdatetime = date("Y-m-d");
        $query = Reservation::query();
        $query->where("user_id", "=", $id);
        $query->where("checkout_date", ">", $nowdatetime);
        $reservations = $query->get();
        return view("home.reservationplan", ["reservations" => $reservations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = Reservation::query();
        $query->where("id", "=", $id);
        $reservation = $query->get()[0];
        if ($reservation->user_id != Auth::id()){
            return redirect(route('reservation.plan'));
        }
        return view('reservation.update', ['reservation' => $reservation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $today = date("Y-m-d");
        $this->validate($request, [
            'room_count' => 'required|integer|min:1|max:5',
            'checkin_date' => 'required|date|after:'.$today,
            'checkout_date' => 'required|date|after:'.$request->checkin_date,
        ]);
        $reservation = Reservation::where('id','=',$request->id)->get()[0];
        if (!$reservation->plan->can_reserve_in($request->room_count,$request->checkin_date,$request->checkout_date)){
            return redirect(route('reservation.edit',$request->id))->with('message', "予約が埋まっています。");
        }
        $reservation->update($request->all());
        $reservation->save();
        return redirect(route('reservation.plan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::where('id','=', $id)->get()[0];
        $reservation->delete();
        return redirect(route('reservation.plan'));
    }
}
