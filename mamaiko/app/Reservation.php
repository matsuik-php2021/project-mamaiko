<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'hotel_id','plan_id','user_id','checkin_date', 'checkout_date', 'reservation_date','room_count'
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
