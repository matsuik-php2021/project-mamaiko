<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name','category_id','address','access', 'description', 'checkin_time','checkout_time'
    ];

    public function favorited_users(){
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function plans(){
        return $this->hasMany(Plan::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function rate_avg(){
        
    }

}
