<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Http\Requests;
use Session, Redirect;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function country_edit(){
        
        if (Session::get('group') == 'admin'){
            //Categories edit & delete display
            $countries= Country::all();

            if(Session::get('lang') == 'en'){
                return view('en.country.country-delete', compact('countries'));
            }
            return view('country.country-delete', compact('countries'));
        }
            else return Redirect('/');
    
    }

    public function index()
    {
        //
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
            return view('en.country.country-create');
        }
        return view('country.country-create');
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
        $country= new Country;
        $country->ar_name= $request->input('ar_name');
        $country->en_name= $request->input('en_name');
        $country->save();

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Country added successfully!');
        }
        return Redirect::back()->with('message', 'تم إضافة البلد بنجاح!');
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
        //
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
        $country= Country::find($id);
        $country->ar_name= $request->input('ar_name');
        $country->en_name= $request->input('en_name');
        $country->save();

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Country updated successfully!');
        }
        return Redirect::back()->with('message', 'تم تحديث البلد بنجاح!');

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
            $country= Country::find($id);
            $country->jobs()->delete();
            $country->delete();

            if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Country deleted successfully!!');
            }
            return Redirect::back()->with('message', 'تم حذف البلد بنجاح!!');
             }
        else return Redirect('/');
    }
}
