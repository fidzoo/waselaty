<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mcategory;
use App\Category;
use App\Country;
use App\Banner;
use App\Job;
use App\SiteContent;
use Session;
use App\Http\Requests;

class IndexController extends Controller
{
    public function index(){
        /*--------------------
        for search bar */
        $mcat_ar= Mcategory::lists('ar_title', 'id');
        $mcat_en= Mcategory::lists('en_title', 'id');
        $cat_ar= Category::lists('ar_title', 'id');
        $cat_en= Category::lists('en_title', 'id');
        $country_ar= Country::lists('ar_name', 'id');
        $country_en= Country::lists('en_name', 'id');
        //---------------------
        /*
	    $ranked_jobs= Job::where('add_rank', 1)->where('approved', 1)->inRandomOrder()->take(1)->get();
	    $last_jobs= Job::where('approved', 1)->orderBy('created_at','desc')->paginate(20);

        */
        $jobs_count= count(Job::all());

        //Banners:
        $banner_up= Banner::where('ar_position', 'الرئيسية - الأعلى')->first();
        $banner_mid= Banner::where('ar_position', 'الرئيسية - الوسط')->first();
        $banner_down= Banner::where('ar_position', 'الرئيسية - الأسفل')->first();

        //slider images
        $silder_img1= SiteContent::where('item', 'slider_img1')->first();
        $silder_img2= SiteContent::where('item', 'slider_img2')->first();
        $silder_img3= SiteContent::where('item', 'slider_img3')->first();

        //Site Policy part
        $policy= SiteContent::where('item', 'policy')->first();

        if(Session::get('lang') == 'en'){
        	return view('en.index', compact('mcat_en', 'cat_en', 'country_en', 'jobs_count', 'silder_img1', 'silder_img2', 'silder_img3', 'banner_up', 'banner_mid', 'banner_down', 'policy'));
        }
	    return view('index', compact('mcat_ar', 'cat_ar', 'country_ar', 'jobs_count', 'banner_up', 'silder_img1', 'silder_img2', 'silder_img3', 'banner_mid', 'banner_down', 'policy'));

	}
}	
