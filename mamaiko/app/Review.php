<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'rate','review', 'user_id', 'hotel_id',
    ];

    public function user()
    {
        //
    }
    public function hotel()
    {
        //
    }
}
