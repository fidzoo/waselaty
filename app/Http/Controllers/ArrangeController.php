<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Category;
use App\Mcategory;
use App\Country;
use App\Banner;
use Session;
use App\Http\Requests;

class ArrangeController extends Controller
{
    public function sort(Request $request){
    	$hidden= $request->input('page_results');
        $option= $request->input('order');
        $cat_id= $request->input('cat_id');
    	
        date_default_timezone_set("Asia/Qatar");
        $current_time= date('Y-m-d H:m:s');

    	switch ($option) {
    		case 'recent':
    			 if($hidden == 'mcategory_page'){
                    $rank_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('add_rank', 1)->where('approved', 1)->paginate(6);

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    
                    //for results sort purpose
                    $hidden= 'mcategory_page';

                    //Banners
                    $banner_up= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - أعلى')->first();
                    $banner_mid= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - وسط')->first();
                    $banner_down= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - أسفل')->first();
                 
                 }
    			elseif($hidden == 'category_page'){
                    $rank_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('add_rank', 1)->where('approved', 1)->paginate(6);
            

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('approved', 1)->where('add_rank', 0)->paginate(6);

                    //for results sort purpose
                    $hidden= 'category_page';

                    //Banners:
                    $banner_up= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - أعلى')->first();
                    $banner_mid= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - وسط')->first();
                    $banner_down= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - أسفل')->first();            
                }

                break;
    		
    		case 'old':
    			if($hidden == 'mcategory_page'){
                    $rank_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->where('add_rank', 1)->where('approved', 1)->paginate(6);

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    
                    //for results sort purpose
                    $hidden= 'mcategory_page';

                    //Banners
                    $banner_up= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - أعلى')->first();
                    $banner_mid= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - وسط')->first();
                    $banner_down= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - أسفل')->first();
                 
                 }
                elseif($hidden == 'category_page'){
                    $rank_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->where('add_rank', 1)->where('approved', 1)->paginate(6);
            

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->where('approved', 1)->where('add_rank', 0)->paginate(6);

                    //for results sort purpose
                    $hidden= 'category_page'; 

                    //Banners:
                    $banner_up= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - أعلى')->first();
                    $banner_mid= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - وسط')->first();
                    $banner_down= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - أسفل')->first();            
                }

    			break;

    		case 'most-exp':
                 if($hidden == 'mcategory_page'){
                    $rank_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience','desc')->where('add_rank', 1)->where('approved', 1)->paginate(6);

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience','desc')->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    
                    //for results sort purpose
                    $hidden= 'mcategory_page';

                    //Banners
                    $banner_up= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - أعلى')->first();
                    $banner_mid= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - وسط')->first();
                    $banner_down= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - أسفل')->first();
                 
                 }
                elseif($hidden == 'category_page'){
                    $rank_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience','desc')->where('add_rank', 1)->where('approved', 1)->paginate(6);
            

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience','desc')->where('approved', 1)->where('add_rank', 0)->paginate(6);

                    //for results sort purpose
                    $hidden= 'category_page'; 

                    //Banners:
                    $banner_up= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - أعلى')->first();
                    $banner_mid= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - وسط')->first();
                    $banner_down= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - أسفل')->first();           
                }

    			break;

    		case 'low-exp':
    			if($hidden == 'mcategory_page'){
                    $rank_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience')->where('add_rank', 1)->where('approved', 1)->paginate(6);

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience')->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    
                    //for results sort purpose
                    $hidden= 'mcategory_page';

                    //Banners
                    $banner_up= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - أعلى')->first();
                    $banner_mid= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - وسط')->first();
                    $banner_down= Banner::where('mcategory_id', $cat_id)->where('ar_position', 'داخلي - أسفل')->first();
                 
                 }
                elseif($hidden == 'category_page'){
                    $rank_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience')->where('add_rank', 1)->where('approved', 1)->paginate(6);
            

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience')->where('approved', 1)->where('add_rank', 0)->paginate(6);

                    //for results sort purpose
                    $hidden= 'category_page';

                    //Banners:
                    $banner_up= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - أعلى')->first();
                    $banner_mid= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - وسط')->first();
                    $banner_down= Banner::where('category_id', $cat_id)->where('ar_position', 'داخلي - أسفل')->first();             
                }
    			break;

    		default:
    			# code...
    			break;
    	}

            /*--------------------
            for search bar */
            $mcat_ar= Mcategory::lists('ar_title', 'id');
            $mcat_en= Mcategory::lists('en_title', 'id');
            $cat_ar= Category::lists('ar_title', 'id');
            $cat_en= Category::lists('en_title', 'id');
            $country_ar= Country::lists('ar_name', 'id');
            $country_en= Country::lists('en_name', 'id');
            //---------------------
  

            if(Session::get('lang') == 'en'){
            return view('en.mcategory.single-mcategory', compact('jobs', 'rank_jobs', 'mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down', 'hidden', 'cat_id'));
            }
        return view('mcategory.single-mcategory', compact('jobs', 'rank_jobs', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down', 'hidden', 'cat_id'));

    }

    /**
    * Api Main Category Sort Function
    **/
    public function apiMainCatSort(Request $request)
    {
        $option= $request->input('order');
        $cat_id= $request->input('cat_id');
        
        date_default_timezone_set("Asia/Qatar");
        $current_time= date('Y-m-d H:m:s');

        switch ($option) {
            case 'recent':
                    $premium_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('add_rank', 1)->where('approved', 1)->paginate(6);
                    //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }

                break;
            
            case 'old':
                    $premium_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->where('add_rank', 1)->where('approved', 1)->paginate(6);
                    //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
                break;

            case 'most-exp':
                    $premium_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience','desc')->where('add_rank', 1)->where('approved', 1)->paginate(6);
                    //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }
                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience','desc')->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
                break;

            case 'low-exp':
                    $premium_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience')->where('add_rank', 1)->where('approved', 1)->paginate(6);
                    //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.mcategory_id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience')->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
                break;

            default:
                # code...
                break;
        }

        return response(['premium_jobs'=>$premium_jobs, 'jobs'=>$jobs]); 
    }

    /**
    * Api Sub Category Sort Function
    **/
    public function apiSubCatSort(Request $request)
    {
        $option= $request->input('order');
        $cat_id= $request->input('cat_id');
        
        date_default_timezone_set("Asia/Qatar");
        $current_time= date('Y-m-d H:m:s');

        switch ($option) {
            case 'recent':
                    $premium_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('add_rank', 1)->where('approved', 1)->paginate(6);
                    //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
                break;
            
            case 'old':
                    $premium_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->where('add_rank', 1)->where('approved', 1)->paginate(6);
                    //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }           

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
                break;

            case 'most-exp':
                    $premium_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience','desc')->where('add_rank', 1)->where('approved', 1)->paginate(6);
                    //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }               

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience','desc')->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
                break;

            case 'low-exp':
                    $premium_jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience')->where('add_rank', 1)->where('approved', 1)->paginate(6);
                    //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }            

                    $jobs= Job::whereHas('categories', function($q)use($cat_id){ 
                    $q->where('categories.id', $cat_id);
                        })->where('expire_date', '>', $current_time)->orderBy('experience')->where('approved', 1)->where('add_rank', 0)->paginate(6);
                    //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
                break;

            default:
                # code...
                break;
        }

        return response(['premium_jobs'=>$premium_jobs, 'jobs'=>$jobs]);
    }

    /*
    * Sort API Text Search results
    */
    public function textSearchSort(Request $request)
    {
        date_default_timezone_set("Asia/Qatar");
        $current_time= date('Y-m-d H:m:s');

        $option= $request->input('order');
        $query= $request->input('search');


        switch ($option) {
            case 'recent':
                $premium_jobs= Job::where('ar_title', 'like', '%'.$query.'%')->where('add_rank', 1)->where('approved', 1)->where('expire_date', '>', $current_time)->orderBy('id','desc')->paginate(6);
                //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }


                $jobs= Job::where('ar_title', 'like', '%'.$query.'%')->where('add_rank', 0)->where('approved', 1)->where('expire_date', '>', $current_time)->orderBy('id','desc')->paginate(6);       
                //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
                break;
            
            case 'old':
                $premium_jobs= Job::where('ar_title', 'like', '%'.$query.'%')->where('add_rank', 1)->where('approved', 1)->where('expire_date', '>', $current_time)->paginate(6);
                //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }

                $jobs= Job::where('ar_title', 'like', '%'.$query.'%')->where('add_rank', 0)->where('approved', 1)->where('expire_date', '>', $current_time)->paginate(6);
                //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }        
                break;

            case 'most-exp':
                $premium_jobs= Job::where('ar_title', 'like', '%'.$query.'%')->where('add_rank', 1)->where('approved', 1)->where('expire_date', '>', $current_time)->orderBy('experience','desc')->paginate(6);
                //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }
                        
                $jobs= Job::where('ar_title', 'like', '%'.$query.'%')->where('add_rank', 0)->where('approved', 1)->where('expire_date', '>', $current_time)->orderBy('experience','desc')->paginate(6);   
                //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
                break;

            case 'low-exp':
                $premium_jobs= Job::where('ar_title', 'like', '%'.$query.'%')->where('add_rank', 1)->where('approved', 1)->where('expire_date', '>', $current_time)->orderBy('experience')->paginate(6);
                //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }
                $jobs= Job::where('ar_title', 'like', '%'.$query.'%')->where('add_rank', 0)->where('approved', 1)->where('expire_date', '>', $current_time)->orderBy('experience')->paginate(6);   
                //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
                break;

            default:
                # code...
                break;
        }

        return response(['premium_jobs'=>$premium_jobs, 'jobs'=>$jobs]);
    }

    /*
    *Sort Api Advanced search results
    */
    public function advSearchSort(Request $request){

        $option= $request->input('order');
        $mcategory= $request->input('mcategory');
        $category= $request->input('category');
        $gender= $request->input('gender');
        $country= $request->input('country');
        $experience= $request->input('experience');

        date_default_timezone_set("Asia/Qatar");
        $current_time= date('Y-m-d H:m:s');

switch ($option) {
    case 'recent':
            //Normal Companies 
            $jobs= Job::where(function($que) use($mcategory, $category){
            if($mcategory !== null && $mcategory !== "all"){
            
                if($category !== null && $category !== "all"){
                    //search in many to many relation
                    $que->whereHas('categories', function($q)use($category){ 
                    $q->where('categories.id', $category);
                        });
                }
            }
            })->where('expire_date', '>', $current_time)->where('add_rank', 0)
            ->where(function($que) use($gender){
                if($gender !== null && $gender !== "all"){
                    $que->where('gender', $gender);
                }
            })->where(function($que) use($country){
                if($country !== null && $country !== "all"){
                    $que->where('country_id', $country);
                }
            })->where(function($que) use($experience){
                if($experience !== null && $experience !== "all"){
                    $que->where('experience', $experience);
                }
            })->where('approved', 1)->orderBy('id','desc')->paginate(6); 
            //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
            
            //Companies with rank 1 
            $premium_jobs= Job::where(function($que) use($mcategory, $category){
            if($mcategory !== null && $mcategory !== "all"){
            
                if($category !== null && $category !== "all"){
                    //search in many to many relation
                    $que->whereHas('categories', function($q)use($category){ 
                    $q->where('categories.id', $category);
                        });
                }
            }
            })->where('expire_date', '>', $current_time)->where('add_rank', 1)
            ->where(function($que) use($gender){
                if($gender !== null && $gender !== "all"){
                    $que->where('gender', $gender);
                }
            })->where(function($que) use($country){
                if($country !== null && $country !== "all"){
                    $que->where('country_id', $country);
                }
            })->where(function($que) use($experience){
                if($experience !== null && $experience !== "all"){
                    $que->where('experience', $experience);
                }
            })->where('approved', 1)->orderBy('id','desc')->paginate(6);
            //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }
                break;

    case 'old':
        //Normal Companies 
        $jobs= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== null && $mcategory !== "all"){
        
            if($category !== null && $category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 0)
        ->where(function($que) use($gender){
            if($gender !== null && $gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== null && $country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== null && $experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('id')->paginate(6); 
        //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
        
        //Companies with rank 1 
        $premium_jobs= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== null && $mcategory !== "all"){
        
            if($category !== null && $category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 1)
        ->where(function($que) use($gender){
            if($gender !== null && $gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== null && $country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== null && $experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('id')->paginate(6); 
        //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }
                break;

    case 'most-exp':
        //Normal Companies 
        $jobs= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== null && $mcategory !== "all"){
        
            if($category !== null && $category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 0)
        ->where(function($que) use($gender){
            if($gender !== null && $gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== null && $country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== null && $experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('experience','desc')->paginate(6); 
        //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
        
        //Companies with rank 1 
        $premium_jobs= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== null && $mcategory !== "all"){
        
            if($category !== null && $category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 1)
        ->where(function($que) use($gender){
            if($gender !== null && $gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== null && $country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== null && $experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('experience','desc')->paginate(6); 
        //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }
                break;

    case 'low-exp':
        //Normal Companies 
        $jobs= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== null && $mcategory !== "all"){
        
            if($category !== null && $category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 0)
        ->where(function($que) use($gender){
            if($gender !== null && $gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== null && $country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== null && $experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('experience')->paginate(6); 
        //display ID's with existing values
                    foreach($jobs as $job){
                    $job->country;

                    switch ($job->gender) {
                            case '0':
                                $job->gender= 'ذكر';
                                $job->en_gender= 'Male';
                                break;
                            case '1':
                                $job->gender= 'أنثى';
                                $job->en_gender= 'Female';
                                break;
                            default:
                                $job->gender= 'الجميع';
                                $job->en_gender= 'Both';
                                break;
                                }
                        }
        
        //Companies with rank 1 
        $premium_jobs= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== null && $mcategory !== "all"){
        
            if($category !== null && $category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 1)
        ->where(function($que) use($gender){
            if($gender !== null && $gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== null && $country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== null && $experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('experience')->paginate(6);
        //display ID's with existing values
                    foreach($premium_jobs as $prem){
                    $prem->country;

                    switch ($prem->gender) {
                            case '0':
                                $prem->gender= 'ذكر';
                                $prem->en_gender= 'Male';
                                break;
                            case '1':
                                $prem->gender= 'أنثى';
                                $prem->en_gender= 'Female';
                                break;
                            default:
                                $prem->gender= 'الجميع';
                                $prem->en_gender= 'Both';
                                break;
                                }
                        }
                break;
            
            default:
                # code...
                break;
        }

        return response(['premium_jobs'=>$premium_jobs, 'jobs'=>$jobs]);
    }
}
