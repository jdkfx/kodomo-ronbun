@extends('layouts.app')
@section('content')
    <form action="/reports" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <div id="upload-img">
                <label for="thumbnail">タイトル画像</label><br>
                <img v-show="uploadedImage" :src="uploadedImage" class="col-lg-6" /><br>
                <input type="file" files="true" name="thumbnail" id="thumbnail" v-on:change="onFileChange">
            </div>
            <span>{{ $errors->first('thumbnail') }}</span>
        </div>

        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
            <span>{{ $errors->first('title') }}</span>
        </div>

        <div class="form-group">
            <label for="contents_abstract">要約</label>
            <textarea name="contents_abstract" rows="8" cols="80" class="form-control">{{ old('contents_abstract') }}</textarea>
            <span>{{ $errors->first('contents_abstract') }}</span>
        </div>

        <div class="form-group">
            <label for="contents_text">本文</label>
            <textarea name="contents_text" class="form-control">{{ old('contents_text') }}</textarea>
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
                    <option value="" style="display:none;">選択してください</option>
                    @foreach($categories as $category)
                        <option value="{{ $category['value'] }}">{{ $category['text'] }}</option>
                    @endforeach
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
