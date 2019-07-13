@extends('layouts.app')
@section('content')
    <div class="auth">
        <h3>ログイン</h3>
        <p class="auth-link">新規登録は<a href="/register">こちら</a></p>
        <form method="post" class="col-lg-8">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('account_name') ? ' has-error' : '' }}">
                <label for="account_name">アカウント名</label><br>
                <input type="text" name="account_name" id="account_name" value="{{ old('account_name') }}" class="form-control">
                @if ($errors->has('account_name'))
                    <span >{{ $errors->first('account_name') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="password">パスワード</label><br>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <input type="submit" value="ログイン" class="btn btn-info" style="width:100%;">
        </form>
    </div>
@endsection
