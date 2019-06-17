@extends('layouts.app')
@section('content')
    <div class="reports card">
        <div class="card-body text-center">
            <img src="images/化石.jpg" class="img-thumbnail" alt="thumbnailOfReports">
        </div>
        <div class="reportDetail card-body">
            <h2>昆虫の研究</h2>
            <h4>表示名</h4>
            <p>〇年〇月〇日 投稿</p>
            <a class="btn btn-primary" href="write-reports.html">編集</a>
        </div>
        <div class="contents card-body">
            <p>要約が表示されます。</p>
            <div class="text-center">
                <img src="images/化石.jpg" alt="contentsImage" class="img-thumbnail">
            </div>
            <p>本文が表示されます。<br>例<br>１）カブトムシの実験<br>２）チョウチョウの実験<br>３）カマキリの実験<br>本文が表示されます。</p>
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
