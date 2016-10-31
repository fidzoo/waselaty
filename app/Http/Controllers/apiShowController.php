<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mcategory;
use App\Job;
use App\Http\Requests;

class apiShowController extends Controller
{
    public function mainCatShow(Request $request, $id)
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

        return response(['jobs'=>$jobs, 'rank_jobs'=>$rank_jobs]);


    }
}
