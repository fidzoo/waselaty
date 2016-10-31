<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Mcategory;
use App\Category;
use App\Http\Requests;
use Session, Redirect, File;

class BannerController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }

    /*
    * Ajax Get Banners
    */
    public function getBanners(Request $request){
        //
    }

    /*
    * Edit & upload Banners
    */
    public function edit(Request $request){
    	if (Session::get('group') === 'admin'){
    		$banners= Banner::all();
    		
            $mcats= Mcategory::lists('ar_title', 'id');
            $mcats_en= Mcategory::lists('en_title', 'id');

            $cats= Category::lists('ar_title', 'id');
            $cats_en= Category::lists('en_title', 'id');

        if ($request->is('sections-banners')){
            if(Session::get('lang') == 'en'){
                return view('en.banner.mcategory-banners', compact('banners', 'mcats_en', 'cats_en'));
                }
            return view('banner.mcategory-banners', compact('banners', 'mcats', 'cats'));
            }
        elseif ($request->is('jobs-banners')){
            if(Session::get('lang') == 'en'){
                return view('en.banner.jobs-banners', compact('banners', 'mcats_en', 'cats_en'));
                }
            return view('banner.jobs-banners', compact('banners', 'mcats', 'cats'));
            } 
    	}
    	else Redirect('/');
    }

    /*
    **
    */
    public function update(Request $request, $id)
    {
        if (Session::get('group') === 'admin'){
        $banner= Banner::where('id', $id)->firstOrFail();
        
        if ($request->file('ar_image')){
            File::delete($banner->ar_image);
            $file= $request->file('ar_image');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $banner->ar_image= "images/".$filename;
        }
        if ($request->file('en_image')){
            File::delete($banner->en_image);
            $file= $request->file('en_image');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $banner->en_image= "images/".$filename;
        }
        
        $banner->link= $request->input('link');
        $banner->save();

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Banners updated successfully!!');
        }
        return Redirect::back()->with('message', 'تم تحديث البنرات بنجاح!!');
        }  
    }
}
