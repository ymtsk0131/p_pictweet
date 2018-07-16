<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    //
    protected $fillable = ['image', 'content'];

    public function comments() {
      return $this->hasMany('App\Comment');
    }

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function likes() {
      return $this->hasMany('App\Like');
    }

}
