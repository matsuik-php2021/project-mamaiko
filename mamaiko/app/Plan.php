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
    
    public function can_reserve_count($date)
    {
        $count = $this->room_count;
        foreach ($this->reservations as $reservation){
            if($reservation->checkin_date <= $date and
            $reservation->checkout_date > $date){
                $count -= $reservation->room_count;
            }
        }
        return $count;
    }

    public function can_reserve_in($count,$start,$end)
    {
        for ($i = $start; $i < $end; $i = date('Y-m-d', strtotime($i . '+1 day'))) {
            if($this->can_reserve_count($i)<$count){
                return false;
            }
        }
        return true;
    }
}
