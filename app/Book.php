<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'ref', 'title', 'author', 'image', 'category', 'stars', 'booked', 'isbn'
    ];

    // Booking relationship
    public function bookings() {
        return $this->hasMany('App\Booking');
    }

    // Comments relationship
    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
