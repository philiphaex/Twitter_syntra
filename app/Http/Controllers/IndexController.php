<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function index()
    {

        $data= Tweet::orderby('created_at','dsc')->with('user')->get();

        return view('index',[
            'tweets' => $data,
        ]);
    }


}
