@extends('layouts.application')

@section('content')
<div class="sort-buttons">
  <a href="{{ action('TweetsController@index', ['sort' => 'newest']) }}">Newest</a>
  <a href="{{ action('TweetsController@index', ['sort' => 'popular']) }}">Popular</a>
</div>
@forelse ($tweets as $tweet)
<div class="tweet-wrapper">
  <p>
    投稿者：{{ $tweet->user->name }}
    ({{ $tweet->created_at }})
    @if (Auth::id() == $tweet->user_id)
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
    @endif
  </p>
  <p>
    {{ $tweet->content }}
  </p>
  <a href="{{ action('TweetsController@show', $tweet) }}">
    <img src="{{ $tweet->image }}" class="tweet-image">
  </a>
</div>
@empty
<p>最初のTweetを投稿してみましょう！！</p>
@endforelse
<script src="/js/main.js"></script>
@endsection
