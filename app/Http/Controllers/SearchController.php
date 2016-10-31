<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Mcategory;
use App\Country;
use App\Banner;
use App\Job;
use Session;
use App\Http\Requests;

class SearchController extends Controller
{
    /*
    Search without sorting
    */
    public function search(Request $request){

        $mcategory= $request->input('mcategory');
        $category= $request->input('category');
        $gender= $request->input('gender');
    	$country= $request->input('country');
    	$experience= $request->input('experience');

        date_default_timezone_set("Asia/Qatar");
        $current_time= date('Y-m-d H:m:s');
        //$salary= $request->input('salary');
    	//$job_date= $request->input('job_date');

        //for salary cases:
    	// switch ($salary) {
    	// 	case 0:
    	// 		$sal_min= 500; $sal_max=1000;
    	// 		break;
    	// 	case 1:
    	// 		$sal_min=1001; $sal_max=3000;
    	// 		break;
    		
    	// 	default:
    	// 		# code...
    	// 		break;
    	// }
        

        /*The idea in search code is if it got "all" value it skip this condition 
        so it get all results without this condition*/

        //Normal Companies 
        $search= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== "all"){
        
            if($category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 0)
        ->where(function($que) use($gender){
            if($gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('id','desc')->paginate(6); 

        
        //Companies with rank 1 
        $rank_search= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== "all"){
        
            if($category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 1)
        ->where(function($que) use($gender){
            if($gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('id','desc')->get(); 
            

        if(count($search) == 0 && count($rank_search) == 0){
            $result= null;
        }
        else $result= 1; 

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
            $banner_up= Banner::where('category_id', $category)->where('ar_position', 'داخلي - أعلى')->first();
            $banner_mid= Banner::where('category_id', $category)->where('ar_position', 'داخلي - وسط')->first();
            $banner_down= Banner::where('category_id', $category)->where('ar_position', 'داخلي - أسفل')->first();


        if(Session::get('lang') == 'en'){
                return view('en.search.search-results', compact('search', 'rank_search', 'result', 'mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down', 'mcategory', 'category', 'gender', 'country', 'experience'));
            }
        return view('search.search-results', compact('search', 'rank_search', 'result', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down', 'mcategory', 'category', 'gender', 'country', 'experience'));

    }

    /*
    Sort search results
    */
    public function sort(Request $request){

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
            $search= Job::where(function($que) use($mcategory, $category){
            if($mcategory !== "all"){
            
                if($category !== "all"){
                    //search in many to many relation
                    $que->whereHas('categories', function($q)use($category){ 
                    $q->where('categories.id', $category);
                        });
                }
            }
            })->where('expire_date', '>', $current_time)->where('add_rank', 0)
            ->where(function($que) use($gender){
                if($gender !== "all"){
                    $que->where('gender', $gender);
                }
            })->where(function($que) use($country){
                if($country !== "all"){
                    $que->where('country_id', $country);
                }
            })->where(function($que) use($experience){
                if($experience !== "all"){
                    $que->where('experience', $experience);
                }
            })->where('approved', 1)->orderBy('id','desc')->paginate(6); 

            
            //Companies with rank 1 
            $rank_search= Job::where(function($que) use($mcategory, $category){
            if($mcategory !== "all"){
            
                if($category !== "all"){
                    //search in many to many relation
                    $que->whereHas('categories', function($q)use($category){ 
                    $q->where('categories.id', $category);
                        });
                }
            }
            })->where('expire_date', '>', $current_time)->where('add_rank', 1)
            ->where(function($que) use($gender){
                if($gender !== "all"){
                    $que->where('gender', $gender);
                }
            })->where(function($que) use($country){
                if($country !== "all"){
                    $que->where('country_id', $country);
                }
            })->where(function($que) use($experience){
                if($experience !== "all"){
                    $que->where('experience', $experience);
                }
            })->where('approved', 1)->orderBy('id','desc')->get();

            //Banners
            $banner_up= Banner::where('category_id', $category)->where('ar_position', 'داخلي - أعلى')->first();
            $banner_mid= Banner::where('category_id', $category)->where('ar_position', 'داخلي - وسط')->first();
            $banner_down= Banner::where('category_id', $category)->where('ar_position', 'داخلي - أسفل')->first(); 
                break;

    case 'old':
        //Normal Companies 
        $search= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== "all"){
        
            if($category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 0)
        ->where(function($que) use($gender){
            if($gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('id')->paginate(6); 

        
        //Companies with rank 1 
        $rank_search= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== "all"){
        
            if($category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 1)
        ->where(function($que) use($gender){
            if($gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('id')->get(); 

        //Banners
            $banner_up= Banner::where('category_id', $category)->where('ar_position', 'داخلي - أعلى')->first();
            $banner_mid= Banner::where('category_id', $category)->where('ar_position', 'داخلي - وسط')->first();
            $banner_down= Banner::where('category_id', $category)->where('ar_position', 'داخلي - أسفل')->first();
                break;

    case 'most-exp':
        //Normal Companies 
        $search= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== "all"){
        
            if($category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 0)
        ->where(function($que) use($gender){
            if($gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('experience','desc')->paginate(6); 

        
        //Companies with rank 1 
        $rank_search= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== "all"){
        
            if($category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 1)
        ->where(function($que) use($gender){
            if($gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('experience','desc')->get(); 

        //Banners
            $banner_up= Banner::where('category_id', $category)->where('ar_position', 'داخلي - أعلى')->first();
            $banner_mid= Banner::where('category_id', $category)->where('ar_position', 'داخلي - وسط')->first();
            $banner_down= Banner::where('category_id', $category)->where('ar_position', 'داخلي - أسفل')->first();
                break;

    case 'low-exp':
        //Normal Companies 
        $search= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== "all"){
        
            if($category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 0)
        ->where(function($que) use($gender){
            if($gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('experience')->paginate(6); 

        
        //Companies with rank 1 
        $rank_search= Job::where(function($que) use($mcategory, $category){
        if($mcategory !== "all"){
        
            if($category !== "all"){
                //search in many to many relation
                $que->whereHas('categories', function($q)use($category){ 
                $q->where('categories.id', $category);
                    });
            }
        }
        })->where('expire_date', '>', $current_time)->where('add_rank', 1)
        ->where(function($que) use($gender){
            if($gender !== "all"){
                $que->where('gender', $gender);
            }
        })->where(function($que) use($country){
            if($country !== "all"){
                $que->where('country_id', $country);
            }
        })->where(function($que) use($experience){
            if($experience !== "all"){
                $que->where('experience', $experience);
            }
        })->where('approved', 1)->orderBy('experience')->get();

        //Banners
            $banner_up= Banner::where('category_id', $category)->where('ar_position', 'داخلي - أعلى')->first();
            $banner_mid= Banner::where('category_id', $category)->where('ar_position', 'داخلي - وسط')->first();
            $banner_down= Banner::where('category_id', $category)->where('ar_position', 'داخلي - أسفل')->first();
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
                return view('en.search.search-results', compact('search', 'rank_search', 'mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down', 'mcategory', 'category', 'gender', 'country', 'experience'));
            }
        return view('search.search-results', compact('search', 'rank_search', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down', 'mcategory', 'category', 'gender', 'country', 'experience'));

    }
}
