@extends('layouts.app')
@section('content')

    <h1 style="text-align:center;">新規登録</h1>
    <h3 style="text-align:center;">ログインは<a href="/login">こちら</a></h3>
    <form action="register" method="post" style="width:60%;margin:0 auto;">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="account_name">アカウント名</label><br>
            <input type="text" name="account_name" id="account_name" placeholder="（例）ronbun_1234" class="form-control">
            <p>※あとから変更ができません。</p>
            <p>※アルファベットと数字のみ入力可能です。</p>
            <span>{{ $errors->first('account_name') }}</span>
        </div>
        <div class="form-group">
            <label for="display_name">ニックネーム</label><br>
            <input type="text" name="display_name" id="display_name" placeholder="（例）ろんぶん太郎" class="form-control">
            <p>※あとから変更が可能です。</p>
            <span>{{ $errors->first('display_name') }}</span>
        </div>
        <div class="form-group">
            <label for="email">メールアドレス</label><br>
            <input type="email" name="email" id="email" placeholder="（例）sample@example.com" class="form-control">
            <span>{{ $errors->first('email') }}</span>
        </div>
        <div class="form-group">
            <label for="password">パスワード</label><br>
            <input type="password" name="password" id="password" placeholder="（例）password1234" class="form-control">
            <p>※アルファベットと数字のみ入力可能です。</p>
            <span>{{ $errors->first('password') }}</span>
        </div>
        <div class="form-group">
            <label for="password_confirmation">パスワード（確認）</label><br>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="（例）password1234" class="form-control">
            <span>{{ $errors->first('password_confirmation') }}</span>
        </div>
        <input type="submit" value="登録する" class="btn btn-info" style="width:100%;">
    </form>

@endsection
