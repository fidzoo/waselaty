<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mcategory;
use App\Job;
use App\Http\Requests;

class apiShowController extends Controller
{
    /*
    * Main Category Display
    */

    public function mainCatShow($id)
    {
    	$main_cat= Mcategory::find($id);

    	date_default_timezone_set("Asia/Qatar");
            $current_time= date('Y-m-d H:m:s');

    	$rank_jobs= Job::whereHas('categories', function($q)use($main_cat){ 
                $q->where('categories.mcategory_id', $main_cat->id);
                    })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('add_rank', 1)->where('approved', 1)->paginate(6);
        

        $jobs= Job::whereHas('categories', function($q)use($main_cat){ 
                $q->where('categories.mcategory_id', $main_cat->id);
                    })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('approved', 1)->where('add_rank', 0)->paginate(6);
    
        //for results sort purpose
        $hidden= 'mcategory_page';
        $cat_id= $main_cat->id;

        return response(['rank_jobs'=>$rank_jobs, 'jobs'=>$jobs]);
    }

    /*
    * Category Display
    */
    public function categoryShow($id)
    {
        date_default_timezone_set("Asia/Qatar");
        $current_time= date('Y-m-d H:m:s');

        $rank_jobs= Job::whereHas('categories', function($q)use($id){ 
                $q->where('categories.id', $id);
                    })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('add_rank', 1)->where('approved', 1)->paginate(6);
        

        $jobs= Job::whereHas('categories', function($q)use($id){ 
                $q->where('categories.id', $id);
                    })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('approved', 1)->where('add_rank', 0)->paginate(6);

        return response(['rank_jobs'=>$rank_jobs, 'jobs'=>$jobs]);
    }

    /*
    * Single Job Details
    */
    public function jobShow($id)
    {
        $job= Job::findOrFail($id);
        $comments= $job->comments()->where('approve', 0)->get();

                switch ($job->gender) {
                case '0':
                    $gender= 'Male';
                    break;
                case '1':
                    $gender= 'Female';
                    break;
                default:
                    $gender= 'Both';
                    break;
                    }
        return response(['job'=>$job, 'gender'=>$gender]);
    } 

    /*
    * Search Results
    */
    public function search(Request $request)
    {
        $query= $request->input('search');
        
        $rank_jobs= Job::where('ar_title', 'like', '%'.$query.'%')->where('add_rank', 1)->where('approved', 1)->paginate(6);
        $jobs= Job::where('ar_title', 'like', '%'.$query.'%')->where('add_rank', 0)->where('approved', 1)->paginate(6);

        return response(['rank_jobs'=>$rank_jobs, 'jobs'=>$jobs]);
    }
}
