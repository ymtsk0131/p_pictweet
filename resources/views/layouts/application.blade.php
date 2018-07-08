<!DOCTYPE html>
<html lang='ja'>
<head>
  <meta charset="utf-8">
  <title>Pictweet</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="header row">
    <a href="/" class="header-logo">Pictweet</a>
    <a href="{{ url('/tweets/create') }}" class="header-btn">投稿する</a>
    <div class="clear"></div>
  </div>
  <div class="content-wrapper">
    <div class="content row">
      @yield('content')
    </div>
  </div>
</body>
</html>
