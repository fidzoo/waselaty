<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;
use Session, Redirect;
use App\Http\Requests;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
        {
            $this->middleware('auth');
        }

    public function index()
    {
        if(Session::get('group') == 'admin'){
            $prices= Price::all();

            if(Session::get('lang') == 'en'){
                return view('en.price.prices-list', compact('prices'));
                }
            return view('price.prices-list', compact('prices'));
        }
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
            return view('en.price.price-create');
            }     
        return view('price.price-create');
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
        $price= new Price; 
        $price->ar_item= $request->input('ar_item');
        $price->en_title= $request->input('en_title');
        $price->en_item= $request->input('number').' '.$request->input('duration');
        
        $price->normal_price= $request->input('normal_price');
        $price->norm_currency= $request->input('norm_currency');
        $price->paypal_norm_price= $request->input('paypal_norm_price');
        $price->paypal_norm_currency= $request->input('paypal_norm_currency');

        $price->premium_price= $request->input('premium_price');
        $price->prem_currency= $request->input('prem_currency');
        $price->paypal_prem_price= $request->input('paypal_prem_price');
        $price->paypal_prem_currency= $request->input('paypal_prem_currency');
        $price->save();

        return Redirect::back()->with('message', 'تم إضافة السعر بنجاح');
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
            if(Session::get('group') == 'admin'){ 
            $price= Price::find($id);
            
            $number= substr($price->en_item, 0,strpos($price->en_item, " ")); //return 1/2/20/etc.
            $duration= substr($price->en_item, strpos($price->en_item, " ")+1); //return day/week/month/year.

            if(Session::get('lang') == 'en'){
                return view('en.price.edit-price', compact('price', 'duration', 'number'));
                }
            return view('price.edit-price', compact('price', 'duration', 'number')); 
        }
        return Redirect('/');
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
        $price= Price::find($id);

        if ($request->input('id') != $price->id){ //to prevent error that it is already taken 
        $this->validate($request, [
                'id'   =>  'required|unique:prices',
                ], ['رقم الترتيب موجود بالفعل، برجاء أدخل رقم أخر']);
            }

        $price->id= $request->input('id'); 
        $price->ar_item= $request->input('ar_item');
        $price->en_title= $request->input('en_title');
        $price->en_item= $request->input('number').' '.$request->input('duration');
        
        $price->normal_price= $request->input('normal_price');
        $price->norm_currency= $request->input('norm_currency');
        $price->paypal_norm_price= $request->input('paypal_norm_price');
        $price->paypal_norm_currency= $request->input('paypal_norm_currency');

        $price->premium_price= $request->input('premium_price');
        $price->prem_currency= $request->input('prem_currency');
        $price->paypal_prem_price= $request->input('paypal_prem_price');
        $price->paypal_prem_currency= $request->input('paypal_prem_currency');
        $price->save();

        if(Session::get('lang') == 'en'){
            return Redirect('prices')->with('message', 'تم تحديث السعر بنجاح!');
            }
        return Redirect('prices')->with('message', 'تم تحديث السعر بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price= Price::find($id);
        $price->delete();

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Price deleted successfully!');
        }
        return Redirect::back()->with('message', 'تم حذف السعر الإعلان بنجاح!');
    }
}
