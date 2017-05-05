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
//        $data= User::with('followers')->get();

//        $data =


        return view('profile', ['username' => $username]);

    }
}
