@extends('layouts.app')
@section('content')
    <div class="">
        <form action="/{{ $user->account_name }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('commons.error_messages')

            <input type="hidden" name="_method" value="put">

            <div class="form-group">
                <div id="upload-img">
                    <label for="profile_image">プロフィール画像</label><br>
                    <img v-show="uploadedImage" :src="uploadedImage" class="col-lg-3" /><br>
                    <input type="file" name="profile_image" id="profileImage" v-on:change="onFileChange">
                </div>
            </div>

            <div class="form-group">
                <label for="display_name">表示名</label>
                <input type="text" name="display_name" id="display_name" class="form-control" value="{{ $user_detail->display_name }}">
            </div>

            <div class="form-group">
                <label for="profile_text">自己紹介</label>
                <textarea name="profile_text" rows="3" cols="80" class="form-control">{!! $user_detail->profile_text !!}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group  col-lg-6">
                    <label for="status">学年</label>
                    <select name="status" id="status" class="form-control">
                        <?php
                        $check_status_id = $user_detail->status;
                        ?>
                        <option @if($check_status_id == '') selected @endif style="display:none;">未設定</option>
                        <option value="1" @if($check_status_id == '1') selected @endif>小学１年生</option>
                        <option value="2" @if($check_status_id == '2') selected @endif>小学２年生</option>
                        <option value="3" @if($check_status_id == '3') selected @endif>小学３年生</option>
                        <option value="4" @if($check_status_id == '4') selected @endif>小学４年生</option>
                        <option value="5" @if($check_status_id == '5') selected @endif>小学５年生</option>
                        <option value="6" @if($check_status_id == '6') selected @endif>小学６年生</option>
                        <option value="7" @if($check_status_id == '7') selected @endif>中学１年生</option>
                        <option value="8" @if($check_status_id == '8') selected @endif>中学２年生</option>
                        <option value="9" @if($check_status_id == '9') selected @endif>中学３年生</option>
                        <option value="10" @if($check_status_id == '10') selected @endif>高校１年生</option>
                        <option value="11" @if($check_status_id == '11') selected @endif>高校２年生</option>
                        <option value="12" @if($check_status_id == '12') selected @endif>高校３年生</option>
                        <option value="0" @if($check_status_id == '0') selected @endif>大人</option>
                    </select>
                </div>
            </div>

            <input type="submit" value="保存する" class="btn btn-info" style="width:100%;">
        </form>
    </div>
@endsection
