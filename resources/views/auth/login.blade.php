@extends('layouts.app')
@section('content')

    <h1 style="text-align:center;">ログイン</h1>
    <h3 style="text-align:center;">新規登録は<a href="/register">こちら</a></h3>
    <form style="width:60%;margin:0 auto;">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="accountName">アカウント名</label><br>
            <input type="text" name="accountName" id="accountName" placeholder="（例）ronbun_1234" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">パスワード</label><br>
            <input type="password" name="password" id="password" placeholder="（例）password1234" class="form-control">
        </div>
        <input type="submit" value="ログイン" class="btn btn-info" style="width:100%;">
    </form>

@endsection
