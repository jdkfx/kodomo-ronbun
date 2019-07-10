@extends('layouts.app')
@section('content')
    <form action="/reports" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('commons.error_messages')

        <div class="form-group">
            <div id="upload-img">
                <label for="thumbnail">タイトル画像</label><br>
                <img v-show="uploadedImage" :src="uploadedImage" style="width:400px;" /><br>
                <input type="file" files="true" name="thumbnail" id="thumbnail" v-on:change="onFileChange">
            </div>
        </div>

        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="contents_abstract">要約</label>
            <textarea name="contents_abstract" rows="8" cols="80" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="contents_text">本文</label>
            <textarea name="contents_text" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="reportsImage">画像</label><br>
            <input type="file" name="reportsImage" id="reportsImage">
        </div>

        <div class="form-row">
            <div class="form-group  col-lg-6">
                <label for="category_id">カテゴリー</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="" style="display: none;">選択してください</option>
                    <option value="1" @if(old('category_id')=='1') selected @endif>植物（しょくぶつ）</option>
                    <option value="2" @if(old('category_id')=='2') selected @endif>昆虫（こんちゅう）</option>
                    <option value="3" @if(old('category_id')=='3') selected @endif>動物（どうぶつ）</option>
                    <option value="4" @if(old('category_id')=='4') selected @endif>物質（ぶっしつ）</option>
                    <option value="5" @if(old('category_id')=='5') selected @endif>宇宙（うちゅう）</option>
                    <option value="6" @if(old('category_id')=='6') selected @endif>音（おと）</option>
                    <option value="7" @if(old('category_id')=='7') selected @endif>重力（じゅうりょく）</option>
                    <option value="8" @if(old('category_id')=='8') selected @endif>天気（てんき）</option>
                    <option value="9" @if(old('category_id')=='9') selected @endif>磁石（じしゃく）</option>
                    <option value="10" @if(old('category_id')=='10') selected @endif>電気（でんき）</option>
                    <option value="11" @if(old('category_id')=='11') selected @endif>大地（だいち）</option>
                    <option value="0" @if(old('category_id')=='0') selected @endif>その他（そのほか）</option>
                </select>
            </div>
        </div>
        <input type="submit" value="投稿する" class="btn btn-info" style="width:100%;">
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
        toolbarGroups:[
            { name: 'clipboard', groups: [ 'undo', 'clipboard' ] },
            { name: 'styles', groups: [ 'styles' ] },
            '/',
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'insert', groups: [ 'insert' ] },
            { name: 'links', groups: [ 'links' ] },
        ],
        removeButtons:'Source,Save,NewPage,Preview,Print,Templates,PasteText,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Subscript,Superscript,CopyFormatting,RemoveFormat,Strike,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,Language,BidiRtl,BidiLtr,Font,FontSize,Styles,About,Maximize,ShowBlocks,TextColor,BGColor,Flash,SpecialChar,PageBreak,Iframe,Anchor,Image',
    });
</script>
@endsection
