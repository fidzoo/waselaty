<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Price;
use App\Mcategory;
use App\Category;
use App\Country;
use App\Banner;
use Session;
use App\Http\Requests;

class AddsStatsController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }

    /*
    To show adds stats to the admin.. 
    */
    public function addsCount(){
      if(Session::get('group') == 'admin'){
        $pending_company_adds= count(Job::where('add_type', 1)->where('approved', 0)->get());
        $pending_person_adds= count(Job::where('add_type', 2)->where('approved', 0)->get());

        $cash_comp_adds= count(Job::where('add_type', 1)->where('payment', 1)->get());
    	$paypal_comp_adds= count(Job::where('add_type', 1)->where('payment', 2)->get()); 
    	$nopay_comp_adds= count(Job::where('add_type', 1)->where('payment', 0)->get());

    	$cash_pers_adds= count(Job::where('add_type', 2)->where('payment', 1)->get());
    	$paypal_pers_adds= count(Job::where('add_type', 2)->where('payment', 2)->get()); 
    	$nopay_pers_adds= count(Job::where('add_type', 2)->where('payment', 0)->get());
	
		if(Session::get('lang') == 'en'){
            return view('en.adds-stats', compact('pending_company_adds', 'pending_person_adds', 'cash_comp_adds', 'paypal_comp_adds', 'nopay_comp_adds', 'cash_pers_adds', 'paypal_pers_adds', 'nopay_pers_adds'));
        }
        return view('adds-stats', compact('pending_company_adds', 'pending_person_adds', 'cash_comp_adds', 'paypal_comp_adds', 'nopay_comp_adds', 'cash_pers_adds', 'paypal_pers_adds', 'nopay_pers_adds'));
      }
      else return Redirect('/');
    }

    /*
    Adds payment for users
    */
    public function payDisplay(){
        $user_group= Session::get('group');
        if($user_group == 'company' || $user_group == 'person'){
            $user_id= Session::get('user_id');
            $jobs= Job::where('user_id', $user_id)->orderBy('id','desc')->get(); 


            /*--------------------
            for search bar */
            $mcat_ar= Mcategory::lists('ar_title', 'id');
            $mcat_en= Mcategory::lists('en_title', 'id');
            $cat_ar= Category::lists('ar_title', 'id');
            $cat_en= Category::lists('en_title', 'id');
            $country_ar= Country::lists('ar_name', 'id');
            $country_en= Country::lists('en_name', 'id');
            //---------------------

            //Banners
            $banner_up= Banner::all()->random();
            $banner_mid= Banner::all()->random();
            $banner_down= Banner::all()->random();  

            if(Session::get('lang') == 'en'){
                return view('en.payment.user-pay', compact('jobs', 'mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down'));
            }
            return view('payment.user-pay', compact('jobs', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));
        }
    }
}
