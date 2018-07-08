@extends('layouts.application')

@section('content')
<div class="tweet-post">
  <h2>投稿する</h2>
  <form method="post" action="{{ url('/tweets') }}">
    {{ csrf_field() }}
    @if ($errors->has('name'))
    <span class="error">{{ $errors->first('name')}}</span>
    @endif
    <input type="text" name="name" placeholder="your name" value="{{ old('name')}}">
    @if ($errors->has('image'))
    <span class="error">{{ $errors->first('image')}}</span>
    @endif
    <input type="text" name="image" placeholder="image URL" value="{{ old('image')}}">
    @if ($errors->has('content'))
    <span class="error">{{ $errors->first('content')}}</span>
    @endif
    <textarea name="content" placeholder="text">{{ old('content') }}</textarea>
    <input type="submit" class="btn-green" value="SENT">
  </form>
</div>
@endsection
