@extends('layouts.app')
@section('content')
    <div class="auth">
        <h3 class="text-center">パスワードリセット</h3>

        <form class="col-lg-8" method="POST" action="{{ route('password.request') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">
                @if ($errors->has('email'))
                    <span>{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">パスワード</label>
                <input id="password" type="password" class="form-control" name="password">
                @if ($errors->has('password'))
                    <span>{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm">パスワード（確認）</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                    <span>{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <input type="submit" value="パスワードを変更" class="btn btn-info" style="width:100%;">
        </form>
    </div>
@endsection
