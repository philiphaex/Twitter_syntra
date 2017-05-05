<?php

namespace App\Http\Controllers;
use App\Tweet;
use App\User;
use Illuminate\Support\Facades\DB;

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
        $user = DB::table('users')->where('name', $username)->get();

        if(count($user)>0){
            $name = $user[0]->name;
            return view('profile', ['username' => $name]);
        }else{
            return view('errors.404');
        }


    }
}
