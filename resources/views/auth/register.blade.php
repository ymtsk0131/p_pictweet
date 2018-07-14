@extends('layouts.application')

@section('content')
<div class="register">
    <h2>新規登録</h2>
    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
    @csrf
        <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span class="error">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        <input type="submit" class="btn-green" value="SENT">
    </form>
</div>
@endsection
