<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');
Route::get('home', function(){
	return Redirect('/');
});

Route::get('english', function(){
	Session::put('lang', 'en');
	return Redirect('/');
});

Route::get('arabic', function(){
	Session::forget('lang');
	return Redirect('/');
});

Route::get('en-dash', function(){
	Session::put('lang', 'en');
	return Redirect('dash');
});

Route::get('ar-dash', function(){
	Session::forget('lang');
	return Redirect('dash');
});

Route::auth();

Route::resource('jobs', 'JobController');
Route::resource('company-pending', 'JobController@pendingJobs');
Route::resource('person-pending', 'JobController@pendingJobs');
Route::resource('company-status', 'JobController@jobsStatus');
Route::resource('person-status', 'JobController@jobsStatus');
Route::resource('jobs-edit', 'JobController@jobsEdit');
Route::resource('mcategory', 'McategoryController');
Route::resource('mcategory-edit', 'McategoryController@mcats_edit');
Route::get('ar/mcategory/{id}', 'McategoryController@show');
Route::get('en/mcategory/{id}', 'McategoryController@show');
Route::resource('categories', 'CategoryController');
Route::resource('category-edit', 'CategoryController@cat_edit');
Route::resource('countries', 'CountryController');
Route::resource('country-edit', 'CountryController@country_edit');
Route::get('dash', 'AddsStatsController@addsCount');
Route::get('sections-banners', 'BannerController@edit');
Route::get('jobs-banners', 'BannerController@edit');
Route::patch('banners/{id}', 'BannerController@update');
Route::get('search', 'SearchController@search');
Route::post('comments/{id}', 'CommentController@save');
Route::get('adds-pay', 'AddsStatsController@payDisplay');
Route::resource('prices', 'PriceController', ['except' => [
    'show']]);
Route::get('result-sort', 'ArrangeController@sort');
Route::get('ser-sort', 'SearchController@sort');

Route::get('person-reg', 'Auth\AuthController@showRegistrationForm');
Route::get('new-admin', 'AdminController@showAdminForm');
Route::post('new-admin', 'AdminController@store');
Route::get('admin-list', 'AdminController@adminList');
Route::delete('admin-delete/{id}', 'AdminController@destroy');

Route::get('company-list', 'AdminController@usersList');
Route::get('person-list', 'AdminController@usersList');
Route::delete('user-delete/{id}', 'AdminController@userDestroy');

Route::get('site-content', 'SiteContentController@siteContent');
Route::post('site-content', 'SiteContentController@updateContent');

Route::get('back-n-social', 'SiteContentController@backChange');
Route::post('slider-update', 'SiteContentController@updateBack');
Route::post('social-update', 'SiteContentController@updateBack');


//ajax search menu 
Route::get('/ajax-subcat', function(){
	$cat_id= Request::input('cat_id');

	$categories= App\Category::where('mcategory_id', $cat_id)->get();

	return $categories;
});

//ajax Mcategories banners menu
Route::get('/ajax-mbanners', function(){
	$mcat_id= Request::input('mcat_id');

	switch ($mcat_id) {
		case 'home':
			$banners= App\Banner::where('ar_category_title', 'الرئيسية')->get();
			break;	
		default:
			$banners= App\Banner::where('mcategory_id', $mcat_id)->get();
			break;
		}
	return $banners;
});

//ajax Jobs banners menu
Route::get('/ajax-banners', function(){
	$cat_id= Request::input('cat_id');

	$banners= App\Banner::where('category_id', $cat_id)->get();
	
	return $banners;
});

//-------------------
//API Routes 
Route::group(['prefix'=> 'api'], function(){
	Route::get('mcat/{id}', 'apiShowController@mainCatShow');
	Route::get('category/{id}', 'apiShowController@categoryShow');
	Route::get('job/{id}', 'apiShowController@jobShow');
	Route::get('api-search', 'apiShowController@search');
	Route::get('login', 'Auth\AuthController@showLoginForm');
});

Route::group(['prefix'=> 'api', 'middleware'=> 'auth:api'], function(){
	
});





/*
* Code By Farid M.
*/
