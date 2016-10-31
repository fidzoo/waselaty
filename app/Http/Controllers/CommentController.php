<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Comment;
use Session, Redirect;
use App\Http\Requests;

class CommentController extends Controller
{
    public function save(Request $request, $id){
    	$job= Job::find($id);

        $title= $request->input('title');
    	$comment= $request->input('comment');

    	if(Session::get('lang') == 'en'){
    		$job->comments()->create(['ar_title'=>$title, 'ar_body'=>$comment]);

                return Redirect::back()->with('messagae', 'Your comment is added');
            }
            $job->comments()->create(['ar_title'=>$title, 'ar_body'=>$comment]);

            return Redirect::back()->with('messagae', 'تم إرسال التعليق');
    }
}
