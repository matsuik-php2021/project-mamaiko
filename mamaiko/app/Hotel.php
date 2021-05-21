<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name','category_id','address','access', 'description', 'checkin_time','checkout_time'
    ];

    public function favorited_users(){

    }

    public function reviews(){

    }

    public function reservations(){

    }

    public function plans(){

    }

    public function catwgoriesrate_avg(){

    }



}
