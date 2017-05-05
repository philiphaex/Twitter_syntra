<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function follows($username)
    {
        // Find the User. Redirect if the User doesn't exist
        $user = User::where('name', $username)->firstOrFail();
        // Find logged in User
        $id = Auth::user()->id;
        $me = User::find($id);
        $me->following()->attach($user->id);
        return redirect('profile/' . $username);
    }
    public function unfollows($username)
    {
        // Find the User. Redirect if the User doesn't exist
        $user = User::where('name', $username)->firstOrFail();
        // Find logged in User
        $id = Auth::user()->id;
        $me = User::find($id);
        $me->following()->detach($user->id);
        return redirect('profile/' . $username);
    }
}
