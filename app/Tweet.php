<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['message','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
