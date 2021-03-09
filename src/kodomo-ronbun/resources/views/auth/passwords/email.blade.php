@extends('layouts.app')
@section('content')
    <div class="auth">
        <h3 class="text-center">パスワードリセット</h3>
        <form class="col-lg-8" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
                @endif
            </div>

            <input type="submit" value="メールを送信する" class="btn btn-info" style="width:100%;">
        </form>
    </div>
@endsection
