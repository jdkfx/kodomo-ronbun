@extends('layouts.app')
@section('content')
    <div class="reports card">
        <div class="card-body text-center">
            <img src="{{ Storage::url($report_detail->thumbnail) }}" class="img-thumbnail" alt="thumbnailOfReports" style="width:600px;">
        </div>
        <div class="reportDetail card-body">
            <h2>{{ $report->title }}</h2>
            <h4><a href="/{{ $user->account_name }}">{!! e($user_detail->display_name) !!}</a></h4>
            <?php
            $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $report->created_at)->format('Y年m月d日');
             ?>
            <p>{{ $date }} 投稿</p>
            @if(\Auth::check())
                @if(\Auth::user()->id === $report->user_id)
                    <a class="btn btn-primary" href="/reports/{{ $report->id }}/edit">編集</a>
                    <form action="/reports/{{ $report->id }}" method="post" class="mt-2">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <input type="submit" class="btn btn-danger" value="削除">
                    </form>
                @endif
            @endif
        </div>
        <div class="contents card-body">
            <h3>要約</h3>
            <p>{!! nl2br(e($report_abstract->contents_abstract),false) !!}</p>
            <h3>本文</h3>
            <p>{!! $report_text->contents_text !!}</p>
        </div>

        <?php // TODO: コメント機能の追加 ?>
        <!-- <div class="comments card-body">
            <h3>コメント</h3>
            <form>
                <div class="form-group">
                    <input type="text" name="reportsComments" placeholder="コメントを入力" class="form-control mb-2">
                    <input type="submit" value="投稿する" class="btn btn-info" style="width:100%;">
                </div>
            </form>
            <ul class="list-group">
                <li class="list-group-item">userName : コメント</li>
                <li class="list-group-item">userName : コメント</li>
                <li class="list-group-item">userName : コメント</li>
            </ul>
        </div> -->
    </div>
@endsection
