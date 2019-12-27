@extends('layouts.app')
@section('content')
    <div class="reportsIndex">
        @if(isset($keyword))
            <h3 class="text-center">{{ $keyword }} の検索結果 {{ $countReports }}件</h3>
        @endif

        @if(isset($category))
            <h3 class="text-center">{{ $category }} の一覧 {{ $countReports }}件</h3>
        @endif

        @if(count($reports) > 0)
            <ul style="padding:0;">
                @foreach($reports as $report)
                    <li>
                        <div class="reports card">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <img src="https://test-kodomo-ronbun.s3.amazonaws.com/{{ $report->report_detail->thumbnail }}" class="img-thumbnail" alt="thumbnailOfReports">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <h3><a href="/reports/{{ $report->id }}">{{ $report->title }}</a></h3>
                                        <?php
                                        $user = App\User::where('id',$report->user_id)->first();
                                        $user_detail = App\UserDetail::find($user->id);
                                         ?>
                                        <p class="report_detail"><a href="/{{ $user->account_name }}">{!! e($user_detail->display_name) !!}</a></p>
                                        <?php
                                        $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $report->created_at)->format('Y年m月d日');
                                         ?>
                                        <p class="report_detail">{{ $date }} 投稿</p>
                                        <p>{!! nl2br(e($report->report_abstract->contents_abstract),false) !!}</p>
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
