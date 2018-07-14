@extends('layouts.application')

@section('content')
<div class="register">
    <h2>ログイン</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email" class="col-sm-4 col-form-label text-md-right">メールアドレス</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="error">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        @if ($errors->has('password'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">Remember Me</label>
        <input type="submit" class="btn-green" value="SENT">
        <a class="btn btn-link" href="{{ route('password.request') }}">パスワード忘れた？</a>
    </form>
</div>
@endsection
