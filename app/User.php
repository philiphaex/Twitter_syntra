<?php

namespace App;

use App\Tweet;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tweets()
    {
        return $this->hasMany(Tweet::class);

    }

    public function followers()
    {
        return $this->hasMany(Follower::class);

        /*->withPivot('user_id','follower_id')
        ->withTimestamps*/
    }
    
}
