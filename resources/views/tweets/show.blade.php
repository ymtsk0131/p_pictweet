@extends('layouts.application')

@section('content')
<div class="tweets">
  <div class="tweet-wrapper">
    <p>{{ $tweet->name }}さん</p>
    <img src="{{ $tweet->image }}" class="tweet-image"><br>
    <p>{{ $tweet->content }}</p>
  </div>
</div>
@endsection
