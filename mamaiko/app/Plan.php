<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name','description','price','room_count','people', 'hotel_id',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function can_reserve_count()
    {
        $count = $this->room_count;
        foreach ($this->reservations as $reservation){
            if($reservation->checkin_date <= date("Y-m-d") and
            $reservation->checkout_date > date("Y-m-d")){
                $count -= $reservation->room_count;
            }
        }
        return $count;
    }
}
