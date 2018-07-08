@extends('layouts.application')

@section('content')
@forelse ($tweets as $tweet)
<a href="/tweets/{{ $tweet->id }}">
  <div class="tweet-wrapper">
    <p>{{ $tweet->name }}さん</p>
    <img src="{{ $tweet->image }}" class="tweet-image"><br>
    <p>{{ $tweet->content }}</p>
  </div>
</a>
@empty
<p>最初のTweetを投稿してみましょう！！</p>
@endforelse
@endsection
