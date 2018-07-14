@extends('layouts.application')

@section('content')
@forelse ($tweets as $tweet)
<div class="tweet-wrapper">
  {{ $tweet->user->name }}さん
  <a href="{{ action('TweetsController@edit', $tweet) }}">
    [編集]
  </a>
  <a href="#" data-id="{{ $tweet->id }}" class="del">
    [削除]
  </a>
  <form method="post" action="{{ url('/tweets', $tweet->id) }}" id="form_{{ $tweet->id }}">
    {{ csrf_field() }}
    {{ method_field('delete') }}
  </form>
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
<script src="/js/main.js"></script>
@endsection
