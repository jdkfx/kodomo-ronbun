@extends('layouts.app')
@section('content')
    <form action="/reports/{{ $report->id }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="reportsThumbnail">タイトル画像</label><br>
            <input type="file" name="reportsThumbnail" id="reportsThumbnail">
        </div>
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" value="{{ $report->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="reportsAbstract">要約</label>
            <textarea name="reportsAbstract" rows="8" cols="80" placeholder="（例）こんちゅうのふしぎについてしらべてみました。&#13;&#10;※要約に書いた内容はトップページに表示されます。" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="reportsContents">本文</label>
            <textarea name="reportsContents" rows="30" cols="80" placeholder="（例）こんちゅうの食べ物のスキ・キライの実験をしました。&#13;&#10;じつはこんちゅうのスキな食べ物は〇〇で、キライな食べ物は〇〇ということがわかりました。" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="reportsImage">画像</label><br>
            <input type="file" name="reportsImage" id="reportsImage">
        </div>
        <div class="form-row">
            <div class="form-group  col-lg-6">
                <label for="reportsCategory">カテゴリー</label>
                <select name="reportsCategory" id="reportsCategory" class="form-control">
                    <option selected>選択してください</option>
                    <option value="">植物（しょくぶつ）</option>
                    <option value="">昆虫（こんちゅう）</option>
                    <option value="">動物（どうぶつ）</option>
                    <option value="">物質（ぶっしつ）</option>
                    <option value="">宇宙（うちゅう）</option>
                    <option value="">音（おと）</option>
                    <option value="">重力（じゅうりょく）</option>
                    <option value="">天気（てんき）</option>
                    <option value="">磁石（じしゃく）</option>
                    <option value="">電気（でんき）</option>
                    <option value="">大地（だいち）</option>
                    <option value="">その他（そのほか）</option>
                </select>
            </div>
        </div>
        <input type="submit" value="投稿する" class="btn btn-info" style="width:100%;">
    </form>
@endsection
