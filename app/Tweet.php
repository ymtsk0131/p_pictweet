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
}
