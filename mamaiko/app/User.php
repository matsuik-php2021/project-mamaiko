<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     */
    protected $fillable = [
        'name','birthday','address','tel', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function favorite_hotels()
    {
        return $this->belongsToMany(Hotel::class, 'favorites');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function get_point()
    {
        //
    }
    public function use_point()
    {
        //
    }
    public function isLike($hotel_id)
    {
        return $this->favorite_hotels()->where('hotels.id', $hotel_id)->exists();
    }
}
