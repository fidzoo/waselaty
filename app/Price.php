<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable= [
    	'ar_item', 'en_title', 'en_item', 'normal_price', 'norm_currency', 'premium_price', 'prem_currency', 'paypal_norm_price', 'paypal_norm_currency', 'paypal_prem_price', '	paypal_prem_currency'
    ];

    public function jobs(){
    	return $this->hasMany('App\Job');
    }
}
