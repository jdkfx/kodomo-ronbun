@extends('layouts.app')
@section('content')
    <div class="reports card">
        <div class="card-body text-center">
            <img src="https://kodomo-ronbun.s3.amazonaws.com/{{ $report_detail->thumbnail }}" class="col-lg-7" alt="thumbnailOfReports">
        </div>
        <div class="reportDetail card-body">
            <h1>{{ $report->title }}</h1>
            <p class="report_detail"><a href="/{{ $user->account_name }}">{!! e($user_detail->display_name) !!}</a></p>
            <?php
            $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $report->created_at)->format('Y年m月d日');
             ?>
            <p class="report_detail">{{ $date }} 投稿</p>
            @if(\Auth::check())
                @if(\Auth::user()->id === $report->user_id)
                    <div class="dropdown">
                        <button type="button" id="report-dropdown"
                        class="btn dropdown-toggle"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="report-dropdown">
                        <a class="dropdown-item" href="/reports/{{ $report->id }}/edit">編集</a>
                        <form action="/reports/{{ $report->id }}" method="post" class="dropdown-item" style="display:block;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="削除"
                            style="
                            background-color:transparent;
                            border:none;
                            padding:0;
                            margin:0;
                            width:100%;
                            height:100%;
                            text-align:left;
                            display: block;
                            ">
                        </form>
                    </div>
                </div>
                @endif
            @endif
        </div>
        <div class="contents card-body">
            <p class="contents-title">要約</p>
            <p class="contents-body">{!! nl2br(e($report_abstract->contents_abstract),false) !!}</p>
            <p class="contents-title">本文</p>
            <p class="contents-body">{!! $report_text->contents_text !!}</p>
        </div>

        <div class="comments card-body">
            <h3>コメント</h3>
            @if(\Auth::check())
                <form action="/reports/{{ $report->id }}" method="post">
                    <div class="form-group">
                        @csrf
                        <input type="text" name="message" placeholder="コメントを入力" class="form-control mb-2">
                        <input type="hidden" name="report_id" value="{{ $report->id }}">
                        <input type="submit" value="投稿する" class="btn btn-info" style="width:100%;">
                    </div>
                </form>
            @endif
            @if(count($comments) > 0)
                <ul class="list-group">
                    <?php foreach ($comments as $comment): ?>
                        <?php
                        $user = App\User::where('id',$comment->user_id)->first();
                        $user_detail = App\UserDetail::find($user->id);
                         ?>
                        <li class="list-group-item">{{ $user_detail->display_name }} : {!! nl2br(e($comment->message)) !!}</li>
                    <?php endforeach; ?>
                </ul>
            @endif
        </div>
    </div>
@endsection
