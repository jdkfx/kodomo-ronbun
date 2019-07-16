@extends('layouts.app')
@section('content')
<div class="userProfile mt-4 row">
    <div class="profile_image col-lg-4 col-6 mb-4">
        <img src="https://kodomo-ronbun-test.s3-ap-northeast-1.amazonaws.com/{{ $user_detail->profile_image }}" alt="profile_image" class="img-thumbnail">
    </div>
    <div class="profileText col-lg-8 mb-4">
        <h3>{{ $user_detail->display_name }}
            @if(\Auth::check())
                @if(\Auth::user()->id === $user->id)
                    <a href="/{{ $user->account_name }}/edit"><i class="fas fa-user-edit"></i></a>
                @endif
            @endif
        </h3>
        <p>{{ $user->account_name }}</p>
        <?php
        switch($user_detail->status){
            case 1:
                $status_text = '小学１年生';
                break;
            case 2:
                $status_text = '小学２年生';
                break;
            case 3:
                $status_text = '小学３年生';
                break;
            case 4;
                $status_text = '小学４年生';
                break;
            case 5:
                $status_text = '小学５年生';
                break;
            case 6:
                $status_text = '小学６年生';
                break;
            case 7:
                $status_text = '中学１年生';
                break;
            case 8:
                $status_text = '中学２年生';
                break;
            case 9:
                $status_text = '中学３年生';
                break;
            case 10:
                $status_text = '高校１年生';
                break;
            case 11:
                $status_text = '高校２年生';
                break;
            case 11:
                $status_text = '高校３年生';
                break;
            case 0:
                $status_text = '大人';
                break;
            case 99:
                $status_text = '未設定';
                break;
        }

         ?>
        <p>学年：{{ $status_text }}</p>
        <p class="profile_text">{{ $user_detail->profile_text }}</p>
    </div>
</div>
<div class="reportsIndex">
    <h3 class="text-center">投稿したろんぶん</h3>
    @if(count($reports) > 0)
        <ul style="padding:0;">
            @foreach($reports as $report)
                <li>
                    <div class="reports card">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <?php
                                    $report_detail = App\ReportDetail::where('report_id',$report->id)->first();
                                     ?>
                                    <img src="https://kodomo-ronbun-test.s3-ap-northeast-1.amazonaws.com/{{ $report_detail->thumbnail }}" class="img-thumbnail" alt="thumbnailOfReports">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <h3><a href="/reports/{{ $report->id }}">{{ $report->title }}</a></h3>
                                    <p class="report_detail"><a href="/{{ $user->account_name }}">{!! e($user_detail->display_name) !!}</a></p>
                                    <?php
                                    $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $report->created_at)->format('Y年m月d日');
                                     ?>
                                    <p class="report_detail">{{ $date }} 投稿</p>
                                    <?php
                                    $report_abstract = App\ReportAbstract::where('report_id',$report->id)->first();
                                     ?>
                                    <p class="report_abstract">{!! nl2br(e($report_abstract->contents_abstract),false) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
