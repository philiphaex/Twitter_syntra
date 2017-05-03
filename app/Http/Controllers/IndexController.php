<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tweet;
use App\User;

class IndexController extends Controller
{
    public function index()
    {


        $data= Tweet::with('user')->get();

    /*$data = DB::table('Tweets')
            ->join('Users', 'Users.id','=','Tweets.user_id')
            ->select('*')
            ->get();*/



        return view('index',[
            'tweets' => $data
        ]);
    }


}
