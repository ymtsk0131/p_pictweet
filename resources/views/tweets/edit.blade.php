@extends('layouts.application')

@section('content')
<div class="tweet-post">
  <h2>編集する</h2>
  <form method="post" action="{{ url('/tweets', $tweet->id) }}">
    {{ csrf_field() }}
    {{ method_field('patch') }}
    @if ($errors->has('image'))
    <span class="error">{{ $errors->first('image')}}</span>
    @endif
    <input type="text" name="image" placeholder="image URL" value="{{ old('image', $tweet->image)}}">
    @if ($errors->has('content'))
    <span class="error">{{ $errors->first('content')}}</span>
    @endif
    <textarea name="content" placeholder="text">{{ old('content', $tweet->content) }}</textarea>
    <input type="submit" class="btn-green" value="SENT">
  </form>
</div>
@endsection
