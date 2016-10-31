<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mcategory;
use App\Category;
use App\Country;
use App\Banner;
use App\Job;
use Session, Redirect;
use App\Http\Requests;

class McategoryController extends Controller
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
        if(Session::get('group') == 'admin'){

        if(Session::get('lang') == 'en'){

            return view('en.mcategory.mcategory-create');
        }
         
            return view('mcategory.mcategory-create');
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
        if(Session::get('group') == 'admin'){
        $mcategory= new Mcategory;
        $mcategory->ar_title= $request->input('ar_title');
        $mcategory->en_title= $request->input('en_title');
        $mcategory->save();

        //create 3 related Banners in database
        $mcategory->banners()->create(['user_id'=>1, 'ar_category_title'=>$mcategory->ar_title, 'en_category_title'=>$mcategory->en_title, 'mcategory_id'=>$mcategory->id, 'ar_position'=>'داخلي - أعلى', 'en_position'=> 'Inside - Up']);
        $mcategory->banners()->create(['user_id'=>1, 'ar_category_title'=>$mcategory->ar_title, 'en_category_title'=>$mcategory->en_title, 'mcategory_id'=>$mcategory->id, 'ar_position'=>'داخلي - وسط', 'en_position'=> 'Inside - Middle']);
        $mcategory->banners()->create(['user_id'=>1, 'ar_category_title'=>$mcategory->ar_title, 'en_category_title'=>$mcategory->en_title, 'mcategory_id'=>$mcategory->id, 'ar_position'=>'داخلي - أسفل', 'en_position'=> 'Inside - Bottom']);

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Section added successfully! Remember to assign Banners to it from Website Banners area.');
        }
        return Redirect::back()->with('message', 'تم إضافة القسم بنجاح! تذكر تحديد البنرات الخاصه به من قسم البنرات الإعلانية');
        }
        else return Redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->is("en/mcategory/$id")){
            Session::put('lang', 'en');
        }
        elseif ($request->is("ar/mcategory/$id")){
            Session::forget('lang');
        } 

        $main_cat= Mcategory::find($id);

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
            $banner_up= Banner::where('mcategory_id', $main_cat->id)->where('ar_position', 'داخلي - أعلى')->first();
                    $banner_mid= Banner::where('mcategory_id', $main_cat->id)->where('ar_position', 'داخلي - وسط')->first();
                    $banner_down= Banner::where('mcategory_id', $main_cat->id)->where('ar_position', 'داخلي - أسفل')->first();
                    
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
        
        if(Session::get('lang') == 'en'){
            return view('en.mcategory.single-mcategory', compact('jobs', 'jobs_sort', 'rank_jobs', 'mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down', 'hidden', 'cat_id'));
            }
        return view('mcategory.single-mcategory', compact('jobs','jobs_sort' , 'rank_jobs', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down', 'hidden', 'cat_id'));
    }

    /*
    *Edit in place 
    */
    public function mcats_edit()
    {
        if(Session::get('group') == 'admin'){
            $mcats= Mcategory::all();

            if(Session::get('lang') == 'en'){
                return view('en.mcategory.mcategory-edit', compact('mcats'));
            }
            return view('mcategory.mcategory-edit', compact('mcats'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if (Session::get('group') === 'admin'){
        $mcategory= Mcategory::find($id);
        $mcategory->ar_title= $request->input('ar_title');
        $mcategory->en_title= $request->input('en_title');
        $mcategory->save();

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Category Updated successfully!!');
            }
            return Redirect::back()->with('message', 'تم تحديث القسم بنجاح!!');
        }
        else return Redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Session::get('group') === 'admin'){
            $mcategory= Mcategory::find($id);
            $mcategory->banners()->delete();
            $mcategory->delete();

            if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Category deleted successfully!!');
            }
            return Redirect::back()->with('message', 'تم حذف القسم بنجاح!!');
             }
        else return Redirect('/');
    }
}
