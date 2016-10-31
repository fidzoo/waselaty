<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Mcategory;
use App\Category;
use App\Country;
use App\Banner;
use Session;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
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

        if (property_exists($this, 'linkRequestView')) {
            return view($this->linkRequestView);
        }

        if (view()->exists('auth.passwords.email')) {
            if(Session::get('lang') == 'en'){
              return view('en.auth.passwords.email', compact('mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down'));  
            }
            return view('auth.passwords.email', compact('mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));
        }
             
            if(Session::get('lang') == 'en'){
                return view('en.auth.password', compact('mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down'));
            }
        return view('auth.password', compact('mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Http\Response
     */
    public function showResetForm(Request $request, $token = null)
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

        if (is_null($token)) {
            return $this->getEmail();
        }

        $email = $request->input('email');

        if (property_exists($this, 'resetView')) {
            if(Session::get('lang') == 'en'){
                return view($this->resetView)->with(compact('token', 'email', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));
            }
            return view($this->resetView)->with(compact('token', 'email', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));
        }
   
        
        if (view()->exists('auth.passwords.reset')) {
            if(Session::get('lang') == 'en'){
                return view($this->resetView)->with(compact('token', 'email', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));
            }
            return view('auth.passwords.reset')->with(compact('token', 'email', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));
        }

            if(Session::get('lang') == 'en'){
                return view($this->resetView)->with(compact('token', 'email', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));
            }
        return view('auth.reset')->with(compact('token', 'email', 'mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));
    }
    /**
     * Get the response for after a successful password reset.
     *
     * @param  string  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function getResetSuccessResponse($response)
    {
        return redirect($this->redirectPath())->with('passrest', 'success');
    }

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware());
    }

}
