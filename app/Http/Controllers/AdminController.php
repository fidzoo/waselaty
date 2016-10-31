<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\User;
use Session, Redirect;

class AdminController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }
    /*
    *
    This is the form to add a new admin
    */
    public function showAdminForm()
    {
    	if(Session::get('group') == 'admin' && Session::get('role') == 'super'){
        

        if(Session::get('lang') == 'en'){
        	$roles= Role::lists('role', 'id');
            return view('en.admin.admin-form', compact('roles'));
        	}
        $roles= Role::lists('ar_role', 'id');
        return view('admin.admin-form', compact('roles'));
    	}
    	else return Redirect('/');

    }

    public function store(Request $request)
    {
    	$this->validate($request, [
                'email'   =>  'required',
                'email' => 'required|email|max:255|unique:users',
            	'password' => 'required|min:6|confirmed',
                ]);

    	$user= new User;
    	$user->name= $request->input('name');
    	$user->email= $request->input('email');
    	$user->password= bcrypt($request->input('email'));
    	$user->user_group= 'admin';
    	$user->save();

    	$user->roles()->sync($request->get('role'));

    	if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Admin created successfully!');
        	}
        return Redirect::back()->with('message', 'تم إضافة أدمن جديد بنجاح!');

    }
    /*
    * Show admins to delete
    */
    public function adminList()
    {
    	if(Session::get('group') == 'admin' && Session::get('role') == 'super'){
    	$users= User::where('user_group', 'admin')->get();

    	if(Session::get('lang') == 'en'){
    		return view('en.admin.admin-list', compact('users'));
    		}
    	return view('admin.admin-list', compact('users'));
    	}
    }

    public function destroy($id){
    	$user= User::find($id);
    	$user->delete();

    	if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Admin deleted successfully!');
        	}
        return Redirect::back()->with('message', 'تم حذف الأدمن بنجاح!');
    }


    /**
    *
    * Display Registered Accounts in the website
    */
    public function usersList(Request $request)
    {
        if ($request->is('company-list')){
            $users= User::where('user_group', 'company')->orderBy('id','desc')->paginate(25);
            $user_type= 'company';
        }
        else if($request->is('person-list')){
            $users= User::where('user_group', 'person')->orderBy('id','desc')->paginate(25);
            $user_type= 'person';
        }

        if(Session::get('lang') == 'en'){
            return view('en.admin.users-list', compact('users', 'user_type'));
        }
        return view('admin.users-list', compact('users', 'user_type'));
    }

    /**
    *
    * Delete User
    */
    public function userDestroy($id)
    {
        $user= User::find($id);
        if ($user->user_group == "company"){
            $company= $user->company()->first();
            $company->delete();
            }
        //jobs delete is by foreign key
        $user->delete();

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'User deleted successfully!');
            }
        return Redirect::back()->with('message', 'تم حذف المستخدم بنجاح!');
    }
}
