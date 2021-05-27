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
        return $this->belongsTo(User::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function comments(){
        return $this->hasMany('Comment', 'id');
    }

    public function isUnique()
    {
        $other_reviews = $this->hotel->reviews;
        foreach($other_reviews as $review){
            if($review->user->id == $this->user_id){
                return false;
            }
        }
        return true;
    }
}
