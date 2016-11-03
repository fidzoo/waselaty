<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Mcategory;
use App\Country;
use App\Banner;
use App\Job;
use App\Http\Requests;
use Session, Redirect;

class CategoryController extends Controller
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

    public function cat_edit(){
        
        if (Session::get('group') == 'admin'){
            //Categories edit & delete display
            $categories= Category::all();

            if(Session::get('lang') == 'en'){
                $mcategories= Mcategory::lists('en_title', 'id');
                return view('en.category.category-delete', compact('categories', 'mcategories'));
            }
            $mcategories= Mcategory::lists('ar_title', 'id');
            return view('category.category-delete', compact('categories', 'mcategories'));
        }
            else return Redirect('/');
    
    }    

    public function index()
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
        
            date_default_timezone_set("Asia/Qatar");
            $current_time= date('Y-m-d H:m:s');

        $rank_jobs= Job::where('expire_date', '>', $current_time)->orderBy('id','desc')->where('add_rank', 1)->where('approved', 1)->get();
        $jobs= Job::where('expire_date', '>', $current_time)->orderBy('id','desc')->where('approved', 1)->where('add_rank', 0)->paginate(5);

        if(Session::get('lang') == 'en'){
            return view('en.category.all-category', compact('jobs', 'rank_jobs', 'mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down'));
            }
        return view('category.all-category', compact('jobs', 'rank_jobs', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));

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
            $mcategory= Mcategory::lists('en_title', 'id');

            return view('en.category.category-create', compact('mcategory'));
        }

            $mcategory= Mcategory::lists('ar_title', 'id');
         
            return view('category.category-create', compact('mcategory'));
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
        $category= new Category;
        $category->ar_title= $request->input('ar_title');
        $category->en_title= $request->input('en_title');
        $category->mcategory_id= $request->input('mcategory');
        $category->save();

        //create 3 related Banners in database
        $category->banners()->create(['user_id'=>1, 'ar_category_title'=>$category->ar_title, 'en_category_title'=>$category->en_title, 'category_id'=>$category->id, 'ar_position'=>'داخلي - أعلى', 'en_position'=> 'Inside - Up']);
        $category->banners()->create(['user_id'=>1, 'ar_category_title'=>$category->ar_title, 'en_category_title'=>$category->en_title, 'category_id'=>$category->id, 'ar_position'=>'داخلي - وسط', 'en_position'=> 'Inside - Middle']);
        $category->banners()->create(['user_id'=>1, 'ar_category_title'=>$category->ar_title, 'en_category_title'=>$category->en_title, 'category_id'=>$category->id, 'ar_position'=>'داخلي - أسفل', 'en_position'=> 'Inside - Bottom']);

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Category added successfully! Remember to assign Banners to it from Website Banners area.');
        }
        return Redirect::back()->with('message', 'تم إضافة التصنيف بنجاح! تذكر تحديد البنرات الخاصه به من قسم البنرات الإعلانية');
        }
        else return Redirect('/');
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

            //Banners:
            $banner_up= Banner::where('category_id', $id)->where('ar_position', 'داخلي - أعلى')->first();
            $banner_mid= Banner::where('category_id', $id)->where('ar_position', 'داخلي - وسط')->first();
            $banner_down= Banner::where('category_id', $id)->where('ar_position', 'داخلي - أسفل')->first();
            
            date_default_timezone_set("Asia/Qatar");
            $current_time= date('Y-m-d H:m:s');

        $rank_jobs= Job::whereHas('categories', function($q)use($id){ 
                $q->where('categories.id', $id);
                    })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('add_rank', 1)->where('approved', 1)->get();
        

        $jobs= Job::whereHas('categories', function($q)use($id){ 
                $q->where('categories.id', $id);
                    })->where('expire_date', '>', $current_time)->orderBy('id','desc')->where('approved', 1)->where('add_rank', 0)->paginate(6);
        
        //for results sort purpose
        $hidden= 'category_page';
        $cat_id= Category::find($id)->id;

        if(Session::get('lang') == 'en'){
            return view('en.mcategory.single-mcategory', compact('jobs', 'rank_jobs', 'mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down', 'hidden', 'cat_id'));
            }
        return view('mcategory.single-mcategory', compact('jobs', 'rank_jobs', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down', 'hidden', 'cat_id'));

       
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
        if(Session::get('group') == 'admin'){

        $category= Category::find($id);

        $category->ar_title= $request->input('ar_title');
        $category->en_title= $request->input('en_title');
        $category->mcategory_id= $request->input('mcategory');
        $category->save();

        if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Job Category Updated successfully!');
            }
        return Redirect::back()->with('message', 'تم تحديث تصنيف الوظيفة بنجاح!');
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
            $category= Category::find($id);
            $category->jobs()->delete();
            $category->banners()->delete();
            $category->delete();

            if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Category deleted successfully!!');
            }
            return Redirect::back()->with('message', 'تم حذف التصنيف بنجاح!!');
             }
        else return Redirect('/');
    }
}
