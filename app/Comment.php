<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id', 'user_id', 'body',
    ];


    // Book relationship
    public function book() {
    	return $this->belongsTo('App\Book');
    }

    // User relationship
    public function user() {
    	return $this->belongsTo('App\User');
    }
}
