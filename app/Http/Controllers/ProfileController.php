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



/*        $query= 'SELECT users.name, tweets.message, tweets.created_at FROM tweets
                 INNER JOIN users
                 ON tweets.user_id = users.id
                 INNER JOIN followers
                 ON followers.user_id = users.id
                 WHERE followers.follower_user_id='.$user->id;*/

        $query = 'SELECT tweets.message, tweets.created_at,users.name
FROM followers
INNER JOIN tweets ON followers.user_id = tweets.user_id
INNER JOIN users ON tweets.user_id = users.id
WHERE followers.follower_user_id = '.$user->id.
' ORDER BY tweets.created_at DESC';

        $followerTweets = DB::select(DB::Raw($query));
        if (count($followerTweets)==0){
            $followerTweets = 'no tweets';
        }

        return view('profile', ['user' => $user, 'followButton' => $showFollow, 'unfollowButton' => $showUnfollow, 'followerTweets'=>$followerTweets]);




    }
}
