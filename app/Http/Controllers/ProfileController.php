<?php

namespace App\Http\Controllers;
use App\Tweet;
use App\User;
use App\Follower;
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
    public function index()
    {
        $data= User::with('tweets','followers')->get();



        



        return view('profile',[
            'tweets' => $data
        ]);
    }
}
