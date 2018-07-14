<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;
use App\Comment;

class CommentsController extends Controller {

  public function __construct() {
      $this->middleware('auth');
  }

  public function store(Request $request, Tweet $tweet) {
    $this->validate($request, [
      'content' => 'required',
    ]);
    $comment = new Comment;
    $comment->content = $request->content;
    $comment->user_id = Auth::id();
    $comment->tweet_id = $tweet->id;
    $comment->save();
    return redirect()->action('TweetsController@show', $tweet);
  }

  public function destroy(Tweet $tweet, Comment $comment) {
    $comment->delete();
    return redirect()->back();
  }
}
