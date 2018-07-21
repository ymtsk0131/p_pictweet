<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;
use App\Http\Requests\TweetRequest;

class TweetsController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index(Request $request) {
      $sort = $request->sort;
      if ($sort == 'newest') {
        $tweets = Tweet::latest()->get();
      } elseif ($sort == 'popular') {
        $tweets = Tweet::withCount('likes')->orderBy('likes_count', 'desc')->get();
      } else {
        $tweets = Tweet::all();
      }
      return view('tweets.index')->with('tweets', $tweets);
    }

    public function show(Tweet $tweet) {
      $like = $tweet->likes->where('user_id', Auth::id())->first();
      return view('tweets.show')->with([
        'tweet' => $tweet,
        'like'  => $like,
      ]);
    }

    public function create() {
      return view('tweets.create');
    }

    public function store(TweetRequest $request) {
      $tweet = new Tweet();
      $tweet->image = $request->image;
      $tweet->content = $request->content;
      $tweet->user_id = Auth::id();
      $tweet->save();
      return redirect('/');
    }

    public function edit(Tweet $tweet) {
      return view('tweets.edit')->with('tweet', $tweet);
    }

    public function update(TweetRequest $request, Tweet $tweet) {
      $tweet->image = $request->image;
      $tweet->content = $request->content;
      $tweet->save();
      return redirect('/');
    }

    public function destroy(Tweet $tweet) {
      if (Auth::check() && Auth::id() == $tweet->user_id) {
        $tweet->delete();
        return redirect('/');
      } else {
        return redirect()->back();
      }
    }
}
