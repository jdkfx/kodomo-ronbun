@extends('layouts.app')
@section('content')
    <div class="reports card">
        <div class="card-body text-center">
            <img src="{{ URL::to('/') }}/images/化石.jpg" class="img-thumbnail" alt="thumbnailOfReports">
        </div>
        <div class="reportDetail card-body">
            <h2>{{ $report->title }}</h2>
            <h4>表示名</h4>
            <p>〇年〇月〇日 投稿</p>
            <a class="btn btn-primary" href="/reports/{{ $report->id }}/edit">編集</a>
            <form action="/reports/{{ $report->id }}" method="post" class="mt-2">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <input type="submit" class="btn btn-danger" value="削除">
            </form>
        </div>
        <div class="contents card-body">
            <p>{!! nl2br(e($report_abstract->contents_abstract),false) !!}</p>
            <div class="text-center">
                <img src="{{ URL::to('/') }}/images/化石.jpg" alt="contentsImage" class="img-thumbnail">
            </div>
            <p>{!! nl2br(e($report_text->contents_text),false) !!}</p>
        </div>
        <div class="comments card-body">
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
        </div>
    </div>
@endsection
