<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetsController extends Controller
{
    //
    public function index() {
      $tweets = Tweet::latest()->get();
      return view('tweets.index', ['tweets' => $tweets]);
    }

    public function show($id) {
      $tweet = Tweet::findOrFail($id);
      return view('tweets.show')->with('tweet', $tweet);
    }

    public function create() {
      return view('tweets.create');
    }

    public function store(Request $request) {
      $tweet = new Tweet();
      $tweet->image = $request->image;
      $tweet->content = $request->content;
      $tweet->save();
      return redirect('/');
    }
}
