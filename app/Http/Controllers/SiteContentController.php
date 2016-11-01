<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContent;
use App\Http\Requests;
use Session, Redirect;

class SiteContentController extends Controller
{
    public function index()
    {
    	//site policy in the main page
    	$site_policy= SiteContent::where('item', 'policy')->first();
    	//registration police in Companies registration
    	$company_reg= SiteContent::where('item', 'company_reg')->first();
    	//registration police in Persons registration
    	$person_reg= SiteContent::where('item', 'person_reg')->first();

    	if(Session::get('lang') == 'en'){
    		return view('en.site-content', compact('site_policy', 'company_reg', 'person_reg'));
    	}
    	return view('site-content', compact('site_policy', 'company_reg', 'person_reg'));
    }

    public function update(Request $request)
    {
    	$item= $request->input('item');

    	$record= SiteContent::where('item', $item)->first();
    	$record->ar_content= $request->input('ar_content');
    	$record->en_content= $request->input('en_content');
    	$record->save();

		if(Session::get('lang') == 'en'){
			return Redirect::back()->with('message', 'Update done successfully!');
			}
    	return Redirect::back()->with('message', 'تم التحديث بنحاج!');
    }
}
