@extends('layouts.app')
@section('content')
    <div class="auth">
        <h3>新規登録</h3>
        <p class="auth-link">ログインは<a href="/login">こちら</a></p>
        <form action="register" method="post" class="col-lg-8">
            @csrf

            <div class="form-group">
                <label for="display_name">名前</label><br>
                <input type="text" name="display_name" id="display_name" value="{{ old('display_name') }}" class="form-control">
                <span>{{ $errors->first('display_name') }}</span>
            </div>

            <div class="form-group">
                <label for="account_name">アカウント名</label><br>
                <input type="text" name="account_name" id="account_name" value="{{ old('account_name') }}" class="form-control">
                <p>英数字のみ使用可能</p>
                <span>{{ $errors->first('account_name') }}</span>
            </div>

            <div class="form-group">
                <label for="email">メールアドレス</label><br>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                <span>{{ $errors->first('email') }}</span>
            </div>

            <div class="form-group">
                <label for="password">パスワード</label><br>
                <input type="password" name="password" id="password" class="form-control">
                <p>英数字のみ使用可能</p>
                <span>{{ $errors->first('password') }}</span>
            </div>

            <div class="form-group">
                <label for="password_confirmation">パスワード（確認）</label><br>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                <span>{{ $errors->first('password_confirmation') }}</span>
            </div>

            <div class="form-group">
                <input name="agree" type="checkbox" value="1"><a href="/terms">利用規約</a>、<a href="/policy">プライバシーポリシー</a>に同意する <br>
                <span>{{ $errors->first('agree') }}</span>
            </div>

            <input type="submit" value="登録する" class="btn" style="width:100%;">
        </form>
    </div>
@endsection
