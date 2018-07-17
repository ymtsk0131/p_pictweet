@extends('layouts.application')

@section('content')
<div class="tweets">
  <div class="tweet-wrapper">
    <p>
      投稿者：{{ $tweet->user->name }}
      ({{ $tweet->created_at }})
      @if (Auth::id() == $tweet->user_id)
        <a href="{{ action('TweetsController@edit', $tweet) }}">
          [編集]
        </a>
        <a href="{{ action('TweetsController@destroy', $tweet) }}">
          [削除]
        </a>
      @endif
    </p>
    <p>
      {{ $tweet->content }}
    </p>
    <img src="{{ $tweet->image }}" class="tweet-image"><br>
    <p>
      LIKE数：{{ $tweet->likes->count() }}
      @if ($like)
        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-like').submit();">LIKEやめるよ</a>
        <form id="delete-like" action="{{ action('LikesController@destroy', [$tweet, $like]) }}" method="POST" style="display:none;">
          {{ csrf_field() }}
          {{ method_field('delete') }}
        </form>
      @else
        <a href="#" onclick="event.preventDefault(); document.getElementById('add-like').submit();">LIKEするよ</a>
        <form id="add-like" action="{{ action('LikesController@store', $tweet) }}" method="POST" style="display:none;">
          {{ csrf_field() }}
        </form>
      @endif
    </p>
    <h3>コメント</h3>
      @forelse ($tweet->comments as $comment)
      <p>
        {{ $comment->user->name }} ＞ {{ $comment->content }}
        @if (Auth::id() == $comment->user_id)
          <a href="#" class="del" data-id="{{ $comment->id }}">
            [削除]
          </a>
          <form method="post" action="{{ action('CommentsController@destroy', [$tweet, $comment]) }}" id="form_{{ $comment->id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
          </form>
        @endif
      </p>
      @empty
      <span>コメントが・・・・・ない！！！</span>
      @endforelse
    <form method="post" action="{{ action('CommentsController@store', $tweet) }}">
      {{ csrf_field() }}
      <input type="text" name="content" placeholder="コメントをどうぞ！" value="{{ old('content') }}">
      @if($errors->has('content'))
      <span class='error'>{{ $errors->first('content') }}</span>
      @endif
      <input type="submit" value="SENT">
    </form>
  </div>
</div>
<script src="/js/main.js"></script>
@endsection
