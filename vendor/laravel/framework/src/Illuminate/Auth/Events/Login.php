<?php

namespace Illuminate\Auth\Events;

use Illuminate\Queue\SerializesModels;
use Session;

class Login
{
    use SerializesModels;

    /**
     * The authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $user;

    /**
     * Indicates if the user should be "remembered".
     *
     * @var bool
     */
    public $remember;

    /**
     * Create a new event instance.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  bool  $remember
     * @return void
     */
    public function __construct($user, $remember)
    {
        $user_group= auth()->user()->user_group;
        $user_id= auth()->user()->id;
         

        if($user_group == 'admin'){
            $admin_role= auth()->user()->roles[0]->role;
            Session::put(['group'=> 'admin', 'role'=> $admin_role]);
        }
        elseif($user_group == 'company'){
            Session::put(['group'=> 'company', 'user_id'=> $user_id]);
        }
        elseif($user_group == 'person'){
            Session::put(['group'=> 'person', 'user_id'=> $user_id]);
        }

        $this->user = $user;
        $this->remember = $remember;
    }
}
