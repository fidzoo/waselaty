<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mcategory;
use App\Category;
use App\Job;
use App\Country;
use App\Http\Requests;

class apiShowController extends Controller
{
    /*
    * All Categories list
    */
    public function allCats()
    {
        $all_cats= Mcategory::with('categories')->get();
        
        return response(['all_cats'=>$all_cats]);
    }


    /*
    * Main Category Display
    */

    public function mainCatShow($id)
    {
    	$main_cat= Mcategory::find($id);

    	date_default_timezone_set("Asia/Qatar");
            $current_time= date('Y-m-d H:m:s');

        $premium_jobs= Job::whereHas('categories', function($q)use($main_cat){ 
                $q->where('categories.mcategory_id', $main_cat->id);
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

        $jobs= Job::whereHas('categories', function($q)use($main_cat){ 
                $q->where('categories.mcategory_id', $main_cat->id);
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

        //for results sort purpose
        $hidden= 'mcategory_page';
        $cat_id= $main_cat->id;

        return response(['premium_jobs'=>$premium_jobs, 'jobs'=>$jobs]);
    }

    /*
    * Category Display
    */
    public function categoryShow($id)
    {
        date_default_timezone_set("Asia/Qatar");
        $current_time= date('Y-m-d H:m:s');

        $premium_jobs= Job::whereHas('categories', function($q)use($id){ 
                $q->where('categories.id', $id);
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

        $jobs= Job::whereHas('categories', function($q)use($id){ 
                $q->where('categories.id', $id);
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

        return response(['premium_jobs'=>$premium_jobs, 'jobs'=>$jobs]);
    }

    /*
    * Single Job Details
    */
    public function jobShow($id)
    {
        $job= Job::findOrFail($id);
        $comments= $job->comments()->where('approve', 0)->get();

        //related jobs (random category method)
        $categories= $job->categories()->get();
       
          $selected=[];
          foreach ($categories as $category){
            array_push($selected, $category->id);
          }
        $random= rand(0,count($categories)-1);
        $selected_cat= Category::where('id', $selected[$random])->firstOrfail();
        $relate_jobs= $selected_cat->jobs()->where('user_id', $job->user_id)->get();

        //Related jobs display ID's with existing values
        foreach($relate_jobs as $relate){
        $relate->country;

        switch ($relate->gender) {
                case '0':
                    $relate->gender= 'ذكر';
                    $relate->en_gender= 'Male';
                    break;
                case '1':
                    $relate->gender= 'أنثى';
                    $relate->en_gender= 'Female';
                    break;
                default:
                    $relate->gender= 'الجميع';
                    $relate->en_gender= 'Both';
                    break;
                    }
            }

        //Job display ID's with existing values
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

        return response(['job'=>$job, 'relate_jobs'=>$relate_jobs]);
    } 

    /*
    * Search Results
    */
    public function textSearch(Request $request)
    {
        date_default_timezone_set("Asia/Qatar");
        $current_time= date('Y-m-d H:m:s');

        $query= $request->input('search');
        
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

        return response(['premium_jobs'=>$premium_jobs, 'jobs'=>$jobs]);
    }

    /*
    *Get Countries
    */
    public function getCountries()
    {
        $countries= Country::all();

        return response(['countries'=>$countries]);
    }

    /*
    *Dropdown Search
    */
    public function advSearch(Request $request)
    {
        $mcategory= $request->input('mcategory');
        $category= $request->input('category');
        $gender= $request->input('gender');
        $country= $request->input('country');
        $experience= $request->input('experience');

        date_default_timezone_set("Asia/Qatar");
        $current_time= date('Y-m-d H:m:s');

        
        //Jobs with rank 1 
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
        })->where('approved', 1)->orderBy('id','desc')->paginate(2);

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

        //Normal Jobs
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
        })->where('approved', 1)->orderBy('id','desc')->paginate(2); 
            
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

        if(count($jobs) == 0 && count($premium_jobs) == 0){
            $result= null;
        }
        else $result= 1; 

        return response(['premium_jobs'=>$premium_jobs, 'jobs'=>$jobs, 'result'=>$result]);
        
    }
}
