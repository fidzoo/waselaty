<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable= [
    	'ar_company', 'en_company',
    ];

    public function user(){
    	return $this->hasOne('App\User');
    }
}
