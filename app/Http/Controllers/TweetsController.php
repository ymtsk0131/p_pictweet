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

    public function show(Tweet $tweet) {
      return view('tweets.show')->with('tweet', $tweet);
    }

    public function create() {
      return view('tweets.create');
    }

    public function edit(Tweet $tweet) {
      return view('tweets.edit')->with('tweet', $tweet);
    }

    public function update(Request $request, Tweet $tweet) {
      $this->validate($request, [
        'name' => 'required',
        'image' => 'required',
        'content' => 'required|max:20'
      ]);
      $tweet->name = $request->name;
      $tweet->image = $request->image;
      $tweet->content = $request->content;
      $tweet->save();
      return redirect('/');
    }

    public function store(Request $request) {
      $this->validate($request, [
        'name' => 'required',
        'image' => 'required',
        'content' => 'required|max:20'
      ]);
      $tweet = new Tweet();
      $tweet->name = $request->name;
      $tweet->image = $request->image;
      $tweet->content = $request->content;
      $tweet->save();
      return redirect('/');
    }
}
