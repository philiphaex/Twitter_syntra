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

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_user_id');

    }
    public function isFollowing(User $user)
    {
        return !is_null($this->following()->where('user_id', $user->id)->first());
    }

    public function timeline()
    {
        $following = $this->following()->with(['tweets' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->get();
        // By default, the tweets will group by user.
        // [User1 => [Tweet1, Tweet2], User2 => [Tweet1]]
        //
        // The timeline needs the tweets without grouping.
        // Flatten the collection.
        $timeline = $following->flatMap(function ($values) {
            return $values->tweets;
        });
        // Sort descending by the creation date
        $sorted = $timeline->sortByDesc(function ($tweet) {
            return $tweet->created_at;
        });
        return $sorted->values()->all();
    }
}
