<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\Comment;

class CommentsController extends Controller
{
    //
  public function store(Request $request, Tweet $tweet) {
    $this->validate($request, [
      'name' => 'required',
      'content' => 'required',
    ]);
    $comment = new Comment([
      'name' => $request->name,
      'content' => $request->content
    ]);
    $tweet->comments()->save($comment);
    return redirect()->action('TweetsController@show', $tweet);
  }

  public function destroy(Tweet $tweet, Comment $comment) {
    $comment->delete();
    return redirect()->back();
  }
}
