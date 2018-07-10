@extends('layouts.application')

@section('content')
<div class="tweets">
  <div class="tweet-wrapper">
    <img src="{{ $tweet->image }}" class="tweet-image"><br>
    <p>
      {{ $tweet->name }}さん
      <a href="{{ action('TweetsController@edit', $tweet) }}">
        [編集]
      </a>
    </p>
    <p>
      {{ $tweet->content }}
    </p>
  </div>
</div>
@endsection
