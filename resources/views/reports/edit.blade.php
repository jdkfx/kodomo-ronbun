@extends('layouts.app')
@section('content')
    <form action="/reports/{{ $report->id }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        <div class="form-group">
            <div id="upload-img">
                <label for="thumbnail">タイトル画像</label><br>
                <p>現在のタイトル画像 ▼</p>
                <img src="https://test-kodomo-ronbun.s3.amazonaws.com/{{ $report_detail->thumbnail }}" class="col-lg-6" alt="">
                <p>変更する場合こちらに表示されます ▼</p>
                <img v-show="uploadedImage" :src="uploadedImage" class="col-lg-6" /><br>
                <input type="file" files="true" name="thumbnail" id="thumbnail"  v-on:change="onFileChange">
            </div>
            <span>{{ $errors->first('thumbnail') }}</span>
        </div>

        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" value="{{ $report->title }}" class="form-control">
            <span>{{ $errors->first('title') }}</span>
        </div>

        <div class="form-group">
            <label for="contents_abstract">要約</label>
            <textarea name="contents_abstract" rows="8" cols="80" class="form-control">{!! $report_abstract->contents_abstract !!}</textarea>
            <span>{{ $errors->first('contents_abstract') }}</span>
        </div>

        <div class="form-group">
            <label for="contents_text">本文</label>
            <textarea name="contents_text" rows="30" cols="80" class="form-control">{!! $report_text->contents_text !!}</textarea>
            <span>{{ $errors->first('contents_text') }}</span>
        </div>

        <?php // TODO: 画像アップロード ?>
        <!-- <div class="form-group">
            <label for="reportsImage">画像</label><br>
            <input type="file" name="reportsImage" id="reportsImage">
        </div> -->

        <div class="form-row">
            <div class="form-group  col-lg-6">
                <label for="category_id">カテゴリー</label>
                <select name="category_id" id="category_id" class="form-control">
                    <?php
                    $check_category_id = $report_detail->category_id;
                     ?>
                    <option value="1" @if($check_category_id == '1') selected @endif>植物（しょくぶつ）</option>
                    <option value="2" @if($check_category_id == '2') selected @endif>昆虫（こんちゅう）</option>
                    <option value="3" @if($check_category_id == '3') selected @endif>動物（どうぶつ）</option>
                    <option value="4" @if($check_category_id == '4') selected @endif>物質（ぶっしつ）</option>
                    <option value="5" @if($check_category_id == '5') selected @endif>宇宙（うちゅう）</option>
                    <option value="6" @if($check_category_id == '6') selected @endif>音（おと）</option>
                    <option value="7" @if($check_category_id == '7') selected @endif>重力（じゅうりょく）</option>
                    <option value="8" @if($check_category_id == '8') selected @endif>天気（てんき）</option>
                    <option value="9" @if($check_category_id == '9') selected @endif>磁石（じしゃく）</option>
                    <option value="10" @if($check_category_id == '10') selected @endif>電気（でんき）</option>
                    <option value="11" @if($check_category_id == '11') selected @endif>大地（だいち）</option>
                    <option value="0" @if($check_category_id == '0') selected @endif>その他（そのほか）</option>
                </select>
                <span>{{ $errors->first('category_id') }}</span>
            </div>
        </div>
        <div class="report-submit">
            <input type="submit" value="投稿する" class="btn" style="width:100%;">
        </div>
    </form>
@endsection
@section('js')
<script>
    CKEDITOR.replace('contents_text',{
        scayt_autoStartup: false,
        toolbarLocation: 'bottom',
        forcePasteAsPlainText: true,
        fillEmptyBlocks: false,
        height: 500,
        toolbarGroups: [
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'links', groups: [ 'links' ] },
            '/',
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'insert', groups: [ 'insert' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            { name: 'forms', groups: [ 'forms' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
            { name: 'colors', groups: [ 'colors' ] },
            { name: 'tools', groups: [ 'tools' ] },
            { name: 'others', groups: [ 'others' ] },
            { name: 'about', groups: [ 'about' ] },
        ],
        removeButtons:'About,Maximize,ShowBlocks,BGColor,TextColor,Styles,Font,FontSize,Iframe,PageBreak,Smiley,Flash,Unlink,Anchor,Language,BidiRtl,BidiLtr,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,CreateDiv,Blockquote,Outdent,Indent,RemoveFormat,CopyFormatting,Select,Textarea,TextField,Radio,Checkbox,Form,Button,ImageButton,HiddenField,Scayt,SelectAll,Find,Replace,Cut,Copy,Paste,PasteText,PasteFromWord,Templates,Save,NewPage,Preview,Print,Source,NumberedList,BulletedList,Image',
    });
</script>
@endsection
