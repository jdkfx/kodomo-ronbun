@extends('layouts.app')
@section('content')
    <div class="user_settings mt-4 card">
        <h3 class="text-center mt-4">アカウント設定</h3>

        @if(session('my_status'))
            <div class="mt-2 card-body">
                <div class="alert alert-success">
                    {{ session('my_status') }}
                </div>
            </div>
        @endif

        <form action="/setting" class="setting_values card-body" method="post">
            @csrf

            @method('PUT')

            <div class="form-group">
                <label for="account_name">アカウント名</label>
                <input type="text" name="account_name" id="account_name" class="form-control" value="{{ $user->account_name }}">
                <p>英数字のみ使用可能</p>
                <span>{{ $errors->first('account_name') }}</span>
            </div>

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                <span>{{ $errors->first('email') }}</span>
            </div>

            <div class="form-group">
                <label for="password">現在のパスワード</label>
                <input type="password" name="password" id="password" class="form-control">
                <span>{{ $errors->first('password') }}</span>
            </div>

            <div class="form-group">
                <label for="passwordNew">新しいパスワード</label>
                <input type="password" name="passwordNew" id="passwordNew" class="form-control">
                <p>英数字のみ使用可能</p>
                <span>{{ $errors->first('passwordNew') }}</span>
            </div>

            <div class="form-group">
                <label for="passwordNew_confirmation">新しいパスワード（確認）</label>
                <input type="password" name="passwordNew_confirmation" id="passwordNew_confirmation" class="form-control">
                <span>{{ $errors->first('passwordNew_confirmation') }}</span>
            </div>

            <div class="user-submit">
                <input type="submit" value="変更を保存する" class="btn" style="width:100%;">
            </div>
        </form>
    </div>
@endsection
