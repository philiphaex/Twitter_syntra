<?php

namespace App\Http\Controllers;
use App\Tweet;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        //Username on index is passed to database to check presence.
        //If profile is entered manually. Non-existing profiles give an error
        $user = User::where('name','=',$username)->firstOrFail();
        $me = Auth::user();


        if(($me->id != $user->id)){
            $showFollow = true;
            if($me->isFollowing($user)){
                $showUnfollow = true;
            }else{
                $showUnfollow=false;
            }

        }else{
            $showFollow = false;
            $showUnfollow=false;

        }

        return view('profile', ['username' => $user->name, 'followButton' => $showFollow, 'unfollowButton' => $showUnfollow]);




    }
}
