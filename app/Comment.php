<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable= [
    	'ar_title', 'en_title', 'ar_body', 'en_body'
    ];

    public function users(){
    	return $this->belongsTo('App\User');
    }

    public function commentable(){
    	return $this->morphTo();
    }
}
