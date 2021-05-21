<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name','description','price','room_count', 'hotel_id',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function can_reserve()
    {
        //
    }
}
