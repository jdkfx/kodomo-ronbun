@extends('layouts.app')
@section('content')
<div class="userProfile row justify-content-center">
    <div class="profileImage text-center col-lg-4 col-6 mb-4">
        <img src="{{ URL::to('/') }}/images/icon.jpg" alt="profileImage" class="img-thumbnail">
    </div>
    <div class="profileText col-lg-8">
        <h4>表示名：{{ $user_detail->display_name }}</h4>
        <h5>アカウント名：{{ $user->account_name }}</h5>
        <p>自己紹介：{{ $user_detail->profile_text }}</p>
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
                                    <img src="{{ Storage::url($report_detail->thumbnail) }}" class="img-thumbnail" alt="thumbnailOfReports">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <h3><a href="/reports/{{ $report->id }}">{{ $report->title }}</a></h3>
                                    <h4><a href="/{{ $user->account_name }}">{!! e($user_detail->display_name) !!}</a></h4>
                                    <?php
                                    $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $report->created_at)->format('Y年m月d日');
                                     ?>
                                    <h4>{{ $date }} 投稿</h4>
                                    <?php
                                    $report_abstract = App\ReportAbstract::where('report_id',$report->id)->first();
                                     ?>
                                    <p>{!! nl2br(e($report_abstract->contents_abstract),false) !!}</p>
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
