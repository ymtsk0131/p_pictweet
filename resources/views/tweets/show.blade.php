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
    <h2>コメント</h2>
      @forelse ($tweet->comments as $comment)
      <p>
        {{ $comment->name }} ＞ {{ $comment->content }}
      </p>
      @empty
      <span>コメントが・・・・・ない！！！</span>
      @endforelse
    <form method="post" action="{{ action('CommentsController@store', $tweet) }}">
      {{ csrf_field() }}
      <input type="text" name="name" placeholder="なまえ" value="{{ old('name') }}">
      @if($errors->has('name'))
      <span class='error'>{{ $errors->first('name') }}</span>
      @endif
      <input type="text" name="content" placeholder="コメントをどうぞ！" value="{{ old('content') }}">
      @if($errors->has('content'))
      <span class='error'>{{ $errors->first('content') }}</span>
      @endif
      <input type="submit" value="SENT">
    </form>
  </div>
</div>
@endsection
