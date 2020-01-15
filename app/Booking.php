<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'book_id', 'from', 'till', 'availability',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'from' => 'datetime',
        'till' => 'datetime',
    ];

    // Book relationship
    public function book() {
    	return $this->belongsTo('App\Book');
    }

    // User relationship
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
