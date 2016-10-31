<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Mcategory;
use App\Category;
use App\Country;
use App\Banner;
use App\Price;
use App\Http\Requests;
use Session, Redirect, File;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show',
            ]]);
        }    
    /*
    for adds status
    */
    public function pendingJobs(Request $request){
        if(Session::get('group') == 'admin'){
            //display companies adds
            if ($request->is('company-pending')){
            $jobs= Job::where('add_type', 1)->where('approved', 0)->orderBy('id','desc')->paginate(25);
            $add_type= 1;
                }
            //display persons adds    
            elseif ($request->is('person-pending')){
            $jobs= Job::where('add_type', 2)->where('approved', 0)->orderBy('id','desc')->paginate(25);
            $add_type= 2;
                }

            if(Session::get('lang') == 'en'){
                return view('en.job.pending-jobs', compact('jobs', 'add_type'));
            }
            return view('job.pending-jobs', compact('jobs', 'add_type'));
        }
        else return Redirect('/');
    } 
    
    /*
    for adds status
    */
    public function jobsStatus(Request $request){
        if(Session::get('group') == 'admin'){
            //display companies adds
            if ($request->is('company-status')){
            $jobs= Job::where('add_type', 1)->orderBy('id','desc')->paginate(25);
            $add_type= 1;
                }
            //display persons adds    
            elseif ($request->is('person-status')){
            $jobs= Job::where('add_type', 2)->orderBy('id','desc')->paginate(25);
            $add_type= 2;
                }

            if(Session::get('lang') == 'en'){
                return view('en.job.admin-jobs-status', compact('jobs', 'add_type'));
            }
            return view('job.admin-jobs-status', compact('jobs', 'add_type'));
        }
        else return Redirect('/');
    }

    /*
    Jobs edit & delete display
    */ 
    public function jobsEdit(){
        $user_group= Session::get('group');
        
        if ($user_group == 'company' || $user_group == 'person'){
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

            date_default_timezone_set("Asia/Qatar"); 

            $current_time= date('Y-m-d H:m:s');             

            if(Session::get('lang') == 'en'){
                return view('en.job.jobs-edit', compact('jobs', 'mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down', 'current_time'));
            }
            return view('job.jobs-edit', compact('jobs', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down', 'current_time'));
        }
        elseif($user_group == 'admin'){
            return Redirect('dash');
        }
    }

    public function index()
    {
        return Redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        $user_group= Session::get('group');
        if($user_group == 'company' || $user_group == 'person'){

        
            
        if(Session::get('lang') == 'en'){
            $duration= Price::lists('en_title', 'id');
            return view('en.job.job-create', compact('mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down', 'duration'));
        }
        $duration= Price::lists('ar_item', 'id');
        return view('job.job-create', compact('mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down', 'duration'));
        }
        else return Redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request, [
                'ar_title'   =>  'required',
                'categories'   =>  'required',
                ]);

        $job= new Job;
        $job->ar_title= $request->input('ar_title');
        $job->en_title= $request->input('en_title');
        $job->ar_descrip= $request->input('ar_descrip');
        $job->en_descrip= $request->input('en_descrip');
        $job->gender= $request->input('gender');
        $job->phone= $request->input('phone');
        $job->email= $request->input('email');
        $job->image= "assets/images/was_default_user.png";
        $job->user_id= auth()->user()->id;
        $job->country_id= $request->get('country');
        $job->add_rank= $request->get('add_rank');

        $job->salary= $request->input('salary');
        $job->ar_currency= $request->input('ar_currency');
        $job->en_currency= $request->input('en_currency');
        $job->experience= $request->input('experience');
        
        $price= Price::where('id', $request->input('duration'))->first();
        $job->duration= $price->en_item;
        $job->price_id= $price->id;

        //insert Addvetisment type (company add or person add)
        if(Session::get('group') == 'company'){
            $job->add_type= 1;       
            }
        elseif(Session::get('group') == 'person'){
            $job->add_type= 2;

            }

        if ($request->file('image')){
            $file= $request->file('image');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $job->image= "images/".$filename;
        }

        $job->save();
        $job->categories()->sync($request->get('categories'));

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Job created successfully and waiting for admin approve!');
        }
        return Redirect::back()->with('message', 'تم إنشاء الوظيفة بنجاح وفي انتظار موافقة الإدارة!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*--------------------
        for search bar */
        $mcat_ar= Mcategory::lists('ar_title', 'id');
        $mcat_en= Mcategory::lists('en_title', 'id');
        $cat_ar= Category::lists('ar_title', 'id');
        $cat_en= Category::lists('en_title', 'id');
        $country_ar= Country::lists('ar_name', 'id');
        $country_en= Country::lists('en_name', 'id');
        //---------------------

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

        //Banners:
        $banner_up= Banner::where('category_id', $selected_cat->id)->where('ar_position', 'داخلي - أعلى')->first();
        $banner_mid= Banner::where('category_id', $selected_cat->id)->where('ar_position', 'داخلي - وسط')->first();
        $banner_down= Banner::where('category_id', $selected_cat->id)->where('ar_position', 'داخلي - أسفل')->first();

        //the view:
        if(Session::get('lang') == 'en'){
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
            return view('en.job.job-details', compact('job', 'comments', 'gender', 'relate_jobs', 'mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down'));
        }
            switch ($job->gender) {
                case '0':
                    $gender= 'ذكر';
                    break;
                case '1':
                    $gender= 'أنثى';
                    break;
                default:
                    $gender= 'الكل';
                    break;
                    }
        return view('job.job-details', compact('job', 'comments', 'gender', 'relate_jobs', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

        $job= Job::find($id);

        $selected= []; //for selected categories
        foreach($job->categories as $cat){
            array_push($selected, $cat->id);
            }

        $user_group= Session::get('group');
        if($user_group == 'company' || $user_group == 'person'){
            if(Session::get('lang') == 'en'){
                return view('en.job.job-inside-edit', compact('job', 'cat_en', 'country_en', 'mcat_en', 'banner_up', 'banner_mid', 'banner_down', 'selected'));
            }
            return view('job.job-inside-edit', compact('job', 'cat_ar', 'country_ar', 'mcat_ar', 'banner_up', 'banner_mid', 'banner_down', 'selected'));
        }
        //the admin approve display
        elseif($user_group == 'admin'){
            if(Session::get('lang') == 'en'){
                $duration= Price::lists('en_title', 'id');
                return view('en.job.admin-job-aprove', compact('job', 'cat_en', 'country_en', 'selected', 'duration'));
            }
            $duration= Price::lists('ar_item', 'id');
            return view('job.admin-job-aprove', compact('job', 'cat_ar', 'country_ar', 'selected', 'duration'));
        }
        else return Redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //advertisement admin approve process 
        date_default_timezone_set("Asia/Qatar");    
            $jobs= Job::all();
            $job= Job::find($id);
            $job->ar_title= $request->input('ar_title');
            $job->en_title= $request->input('en_title');
            $job->ar_descrip= $request->input('ar_descrip');
            $job->en_descrip= $request->input('en_descrip');
            $job->gender= $request->input('gender');
            $job->phone= $request->input('phone');
            $job->email= $request->input('email');
            $job->country_id= $request->get('country');
            
            $job->salary= $request->input('salary');
            $job->ar_currency= $request->input('ar_currency');
            $job->en_currency= $request->input('en_currency');
            $job->experience= $request->input('experience');
            
            $price= Price::where('id', $request->input('duration'))->first();
            $job_duration= $price->en_item;
            $job->duration= $price->en_item;
            $job->price_id= $price->id;

            //set job expire date and time
            $current_date = date('Y-m-d h:i:sa');
            $expire_date = strtotime('+'.$job_duration, strtotime($current_date));
            if(Session::get('group') == 'admin'){
            $job->expire_date = date('Y-m-d H:i:sa', $expire_date);
                //this admin condition couz date will be set to diffrent value due it is not enabled by user to change so it will put old value.
                }            
          
        //it is delete old pic first the upload new one
        if ($request->file('image')){
            if ($job->image != "assets/images/was_default_user.png"){
            File::delete($job->image);
                }
            $file= $request->file('image');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $job->image= "images/".$filename;
            }
            
        if(Session::get('group') == 'admin'){
            $approve= $request->input('review');
            if($approve == 'موافقة' || $approve == 'Approve'){
                $job->approved= 1;    
            }
            else{ 
                $job->approved= 2;
                 }

            $job->add_rank= $request->input('add_rank');     
            $job->payment= $request->input('payment');
            $job->save();
            $job->categories()->sync($request->get('categories'));

            //to select redirect between companies or persons
        if ($job->add_type == 1){  
        if(Session::get('lang') == 'en'){
                return Redirect('company-status')->with('jobs', $jobs)->with('message', 'Status updated successfully!');
            }
            return Redirect('company-status')->with('jobs', $jobs)->with('message', 'تم تحديث حالة الإعلان بنجاح!');
                }
        elseif ($job->add_type == 2){  
            if(Session::get('lang') == 'en'){
                return Redirect('person-status')->with('jobs', $jobs)->with('message', 'Status updated successfully!');
            }
            return Redirect('person-status')->with('jobs', $jobs)->with('message', 'تم تحديث حالة الإعلان بنجاح!');
                }
        }
        else{
        //update job by client


        $job->save();
        $job->categories()->sync($request->get('categories'));

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Job Updated successfully!');
        }
        return Redirect::back()->with('message', 'تم تعديل الوظيفة بنجاح!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job= Job::find($id);
        if ($job->image != "assets/images/was_default_user.png"){
            File::delete($job->image);
            }
        $job->delete();

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Job deleted successfully!');
        }
        return Redirect::back()->with('message', 'تم حذف إعلان الوظيفة بنجاح!');
    }
}
