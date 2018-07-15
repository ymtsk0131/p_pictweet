<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Like;
use App\Tweet;


class LikesController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function store(Tweet $tweet) {
      $like = new Like;
      $like->user_id = Auth::id();
      $like->tweet_id = $tweet->id;
      $like->save();
      return redirect()->back();
    }
}
