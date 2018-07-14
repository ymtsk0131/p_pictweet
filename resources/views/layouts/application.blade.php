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
    @guest
      <a href="{{ route('login') }}" class="header-btn">{{ __('ログイン') }}</a>
      <a href="{{ route('register') }}" class="header-btn">{{ __('新規登録') }}</a>
    @else
      <a href="{{ url('/tweets/create') }}" class="header-btn">投稿する</a>
      <a href="{{ route('logout') }}" class="header-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          {{ __('ログアウト') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    @endguest
    <div class="clear"></div>
  </div>
  <div class="content-wrapper">
    <div class="content row">
      @yield('content')
    </div>
  </div>
</body>
</html>
