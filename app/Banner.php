<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable= [
    	'user_id', 'ar_position', 'en_position', 'ar_image', 'en_image', 'link', 'ar_category_title', 'en_category_title',
    ];

    public function categories(){
    	return $this->belongsTo('App\Banner');
    }

    public function mcategories(){
    	return $this->belongsTo('App\Mcategory');
    }
}
