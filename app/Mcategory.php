<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mcategory extends Model
{
	protected $fillable = [
			'ar_title', 'en_title',
	];

    public function categories(){
    	return $this->hasMany('App\Category');
    }

    public function banners(){
    	return $this->hasMany('App\Banner');
    }
}
