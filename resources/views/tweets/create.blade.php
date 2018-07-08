@extends('layouts.application')

@section('content')
<div class="tweet-post">
  <h2>投稿する</h2>
  <form method="post" action="{{ url('/tweets') }}">
    {{ csrf_field() }}
    <input type="text" name="image" placeholder="image URL">
    <textarea name="content" placeholder="text"></textarea>
    <input type="submit" class="btn-green" value="SENT">
  </form>
</div>
@endsection
