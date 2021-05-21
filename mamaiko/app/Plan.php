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
        //
    }
    public function reservation()
    {
        //
    }
    public function can_reserve()
    {
        //
    }
}
