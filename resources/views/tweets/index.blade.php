<!DOCTYPE html>
<html lang='ja'>
<head>
  <meta charset="utf-8">
  <title>Pictweet</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="header row">
    <h1 class="header-logo">Pictweet</h1>
  </div>
  <div class="content-wrapper">
    <div class="content row">
      <div class="tweets">
        @forelse ($tweets as $tweet)
        <div class="tweet-wrapper">
          <img src="{{ $tweet->image }}" class="tweet-image"><br>
          <p>{{ $tweet->content }}</p>
        </div>
        @empty
        <p>最初のTweetを投稿してみましょう！！</p>
        @endforelse
      </div>
    </div>
  </div>
</body>
</html>
