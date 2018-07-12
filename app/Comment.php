<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
  protected $fillable = ['name', 'content'];

  public function tweet() {
    return $this->belongsTo('App\Tweet');
  }
}
