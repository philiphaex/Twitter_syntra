<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowerController extends Controller
{
    //

    public function users()
    {
        return $this->hasMany(User::class);

    }
}
