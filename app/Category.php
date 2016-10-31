<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable= [
    	'ar_title', 'en_title'
    ];

    public function jobs(){
    	return $this->belongsToMany('App\Job');
    }

    public function mcategory(){
    	return $this->belongsTo('App\Mcategory');
    }

    public function banners(){
    	return $this->hasMany('App\Banner');
    }
}
