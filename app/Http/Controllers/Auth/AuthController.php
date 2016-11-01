<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Company;
use App\Mcategory;
use App\Category;
use App\Country;
use App\Banner;
use App\SiteContent;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function showLoginForm(){
        $view = property_exists($this, 'loginView')
                    ? $this->loginView : 'auth.authenticate';

        if (view()->exists($view)) {
            return view($view);
        }

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
                    
            if(Session::get('lang') == 'en'){
                return view('en.auth.login', compact('mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down'));
            }
        return view('auth.login', compact('mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down'));
    }
    /*
    *
    */
    public function showRegistrationForm(Request $request)
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }
            if ($request->is('person-reg')){
                Session::flash('reg_group', 'person');
                //Registration Policy part
                $reg_policy= SiteContent::where('item', 'person_reg')->first();
            }else {
                Session::forget('reg_group');
                //Registration Policy part
                $reg_policy= SiteContent::where('item', 'company_reg')->first();
            }
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

        if(Session::get('lang') == 'en'){
            return view('en.auth.register', compact('mcat_en', 'cat_en', 'country_en', 'banner_up', 'banner_mid', 'banner_down', 'reg_policy'));
        }
        return view('auth.register', compact('mcat_ar', 'cat_ar', 'country_ar', 'banner_up', 'banner_mid', 'banner_down', 'reg_policy'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['user_group'] == 'person'){
            return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'mobile'    => 'required',
            ]);
        }
        elseif($data['user_group'] == 'company'){
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'ar_company' => 'required', 
            'en_company' => 'required',
            'mobile'    => 'required',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if($data['user_group'] == 'person'){
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'user_group' => 'person',
                'country_code' =>  $data['cou-code'],
                'phone' =>  $data['mobile'],
                'api_token' => str_random(60),
            ]);  
        }
        elseif($data['user_group'] == 'company'){
            $company= new Company;
            $company->ar_company= $data['ar_company'];
            $company->en_company= $data['en_company'];
            $company->ar_info= $data['ar_info'];
            $company->en_info= $data['en_info'];
            $company->save();
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'company_id' => $company->id,
                'user_group' => 'company',
                'country_code' =>  $data['cou-code'],
                'phone' =>  $data['mobile'],
                'api_token' => str_random(60),
            ]);  
        }     
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));

        return redirect($this->redirectPath())->with('reg_success', 'success');
    }
}
