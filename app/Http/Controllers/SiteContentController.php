<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContent;
use App\Http\Requests;
use Session, Redirect, File;

class SiteContentController extends Controller
{
    //Site Policy and Regstration Policy
    public function siteContent()
    {
    	//site policy in the main page
    	$site_policy= SiteContent::where('item', 'policy')->first();
    	//registration police in Companies registration
    	$company_reg= SiteContent::where('item', 'company_reg')->first();
    	//registration police in Persons registration
    	$person_reg= SiteContent::where('item', 'person_reg')->first();

    	if(Session::get('lang') == 'en'){
    		return view('en.content.site-content', compact('site_policy', 'company_reg', 'person_reg'));
    	}
    	return view('content.site-content', compact('site_policy', 'company_reg', 'person_reg'));
    }

    public function updateContent(Request $request)
    {
    	$item= $request->input('item');

    	$record= SiteContent::where('item', $item)->first();
    	$record->ar_content= $request->input('ar_content');
    	$record->en_content= $request->input('en_content');
    	$record->save();

		if(Session::get('lang') == 'en'){
			return Redirect::back()->with('message', 'Update done successfully!');
			}
    	return Redirect::back()->with('message', 'تم التحديث بنجاح!');
    }

    //For Background and social media
    public function backChange()
    {
        $silder_img1= SiteContent::where('item', 'slider_img1')->first();
        $silder_img2= SiteContent::where('item', 'slider_img2')->first();
        $silder_img3= SiteContent::where('item', 'slider_img3')->first();

        //Home page icons
        $prof_jobs= SiteContent::where('item', 'profession_icons')->first();
        $serv_jobs= SiteContent::where('item', 'service_icons')->first();

        //Social media
        $facebook= SiteContent::where('item', 'facebook')->first();
        $twitter= SiteContent::where('item', 'twitter')->first();
        $youtube= SiteContent::where('item', 'youtube')->first();
        $instagram= SiteContent::where('item', 'instagram')->first();

        if(Session::get('lang') == 'en'){
            return view('en.content.back-n-social', compact('silder_img1', 'silder_img2', 'silder_img3', 'prof_jobs', 'serv_jobs', 'facebook', 'twitter', 'youtube', 'instagram'));
        }
        return view('content.back-n-social', compact('silder_img1', 'silder_img2', 'silder_img3', 'prof_jobs', 'serv_jobs', 'facebook', 'twitter', 'youtube', 'instagram'));

    }

    public function updateBack(Request $request)
    {
        if ($request->is('slider-update')){
        //Update the first Image
        if ($request->file('image1')){ 
            $silder_img1= SiteContent::where('item', 'slider_img1')->first();
            File::delete($silder_img1->ar_content);
            $file= $request->file('image1');
            $destinationPath= 'assets/images';
            $filename= $file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $silder_img1->ar_content= "assets/images/".$filename;
            $silder_img1->save();
            }

        //Update 2nd Image
        if ($request->file('image2')){ 
            $silder_img2= SiteContent::where('item', 'slider_img2')->first();
            File::delete($silder_img2->ar_content);
            $file= $request->file('image2');
            $destinationPath= 'assets/images';
            $filename= $file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $silder_img2->ar_content= "assets/images/".$filename;
            $silder_img2->save();
            }

        //Update 3rd Image
        if ($request->file('image3')){ 
            $silder_img3= SiteContent::where('item', 'slider_img3')->first();
            File::delete($silder_img3->ar_content);
            $file= $request->file('image3');
            $destinationPath= 'assets/images';
            $filename= $file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $silder_img3->ar_content= "assets/images/".$filename;
            $silder_img3->save();
            }
        }
        //Update Home Icons
        elseif ($request->is('icons-update')){
            
            //Update professional jobs icon
            if ($request->file('prof_image')){ 
            File::delete('assets/images/profession.png');
            $file= $request->file('prof_image');
            $destinationPath= 'assets/images';
            $filename= 'profession.png';
            $file->move($destinationPath, $filename);
            }

            //Update service jobs icon
            if ($request->file('serv_image')){ 
            File::delete('assets/images/services.png');
            $file= $request->file('serv_image');
            $destinationPath= 'assets/images';
            $filename= 'services.png';
            $file->move($destinationPath, $filename);
            }

        $prof_icon= SiteContent::where('item', 'profession_icons')->first();
        $serv_icon= SiteContent::where('item', 'service_icons')->first();
        $prof_icon->ar_content= $request->input('ar_profession');
        $prof_icon->en_content= $request->input('en_profession');
        $serv_icon->ar_content= $request->input('ar_service');
        $serv_icon->en_content= $request->input('en_service');
        $prof_icon->save();
        $serv_icon->save();

        }
        //Update Social Media links
        elseif ($request->is('social-update')){
        //Update Social Media Links
        $facebook= SiteContent::where('item', 'facebook')->first();
        $twitter= SiteContent::where('item', 'twitter')->first();
        $youtube= SiteContent::where('item', 'youtube')->first();
        $instagram= SiteContent::where('item', 'instagram')->first();

        $facebook->ar_content= $request->input('facebook');
        $twitter->ar_content= $request->input('twitter');
        $youtube->ar_content= $request->input('youtube');
        $instagram->ar_content= $request->input('instagram');

        $facebook->save();
        $twitter->save();
        $youtube->save();
        $instagram->save();

        }

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Update done successfully!');
            }
        return Redirect::back()->with('message', 'تم التحديث بنحاج!');
    }
}
