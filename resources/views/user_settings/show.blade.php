@extends('layouts.app')
@section('content')
    <div class="user_settings mt-4 card">
        <h3 class="text-center mt-4">アカウント設定</h3>
        <div class="setting_values">
            <div class="card-body">
                <p>アカウント名</p>
                <p>{{ $user->account_name }}</p>
            </div>
            <div class="card-body">
                <p>メールアドレス</p>
                <p>{{ $user_detail->email }}</p>
            </div>
            <div class="card-body">
                <p>パスワード</p>
                <p>お忘れの場合はこちらからメールアドレスにパスワードが送信されます。</p>
            </div>
            <?php // TODO: 退会機能を実装する ?>
        </div>
    </div>
@endsection
