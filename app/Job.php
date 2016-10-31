<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable= [
    	'user_id', 'add_rank', 'approved', 'payment', 'job_rank', 'price_id', 'approved', 'payment', 'ar_title', 'en_title', 'ar_descrip', 'en_descrip', 'gender', 'salary', 'ar_currency', 'en_currency', 'experince', 'phone', 'email', 'image', 'expire_date',
    ];

    public function categories(){
    	return $this->belongsToMany('App\Category');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function country(){
    	return $this->belongsTo('App\Country');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function price(){
        return $this->belongsTo('App\Price');
    }
}
