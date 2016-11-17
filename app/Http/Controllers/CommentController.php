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
        return $request;

    	if(Session::get('lang') == 'en'){
            //I choice to put all comments in one place (arabic place) and to display from the arabic
    		$job->comments()->create(['ar_title'=>$title, 'ar_body'=>$comment]);

                return Redirect::back()->with('messagae', 'Your comment is added');
            }
            $job->comments()->create(['ar_title'=>$title, 'ar_body'=>$comment]);

            return Redirect::back()->with('messagae', 'تم إرسال التعليق');
    }

    /*
    *Api Show Jobs Comments functions
    */
    public function apiShowComments($id)
    {
       $comments= Comment::where('commentable_id', $id)->get();
       
       return response(['comments'=>$comments]);
    }

    /*
    *APi Add Comments function
    */
    public function apiAddComments(Request $request, $id)
    {
        $job= Job::find($id);

        $title= $request->input('title');
        $comment= $request->input('comment');

        $job->comments()->create(['ar_title'=>$title, 'ar_body'=>$comment]); 

    }


}
