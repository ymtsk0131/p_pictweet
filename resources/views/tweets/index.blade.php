@extends('layouts.application')

@section('content')
@forelse ($tweets as $tweet)
<div class="tweet-wrapper">
  <p>
    {{ $tweet->name }}さん
    <a href="{{ action('TweetsController@edit', $tweet) }}">
      [編集]
    </a>
  </p>
  <a href="{{ action('TweetsController@show', $tweet) }}">
    <img src="{{ $tweet->image }}" class="tweet-image">
  </a>
  <p>
    {{ $tweet->content }}
  </p>
</div>
@empty
<p>最初のTweetを投稿してみましょう！！</p>
@endforelse
@endsection
