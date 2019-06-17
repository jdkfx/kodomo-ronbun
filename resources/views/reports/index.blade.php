@extends('layouts.app')
@section('content')
    @include('commons.write_reports_button')
    @include('commons.reports_navigation')
    <div class="reportsIndex">
        <h3 id="numberOfNavi">新着の論文 3件</h3>
        @if(count($reports) > 0)
            <ul>
                @foreach($reports as $report)
                    <li>
                        <div class="reports card">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <img src="images/化石.jpg" class="img-thumbnail" alt="thumbnailOfReports">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <h3><a href="/reports/{{ $report->id }}">{{ $report->title }}</a></h3>
                                        <h4><a href="#">表示名</a></h4>
                                        <h4>〇年〇月〇日 投稿</h4>
                                        <p>要約が表示されます</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="reports card">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-body">
                        <img src="images/化石.jpg" class="img-thumbnail" alt="thumbnailOfReports">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card-body">
                        <h3><a href="reports.html">化石の研究</a></h3>
                        <h4><a href="users.html">表示名</a></h4>
                        <h4>〇年〇月〇日 投稿</h4>
                        <p>要約が表示されます</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="reports card">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-body">
                        <img src="images/カブトムシ.jpg" class="img-thumbnail" alt="thumbnailOfReports">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card-body">
                        <h3><a href="reports.html">昆虫の研究</a></h3>
                        <h4><a href="users.html">表示名</a></h4>
                        <h4>〇年〇月〇日 投稿</h4>
                        <p>要約が表示されます</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="reports card">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-body">
                        <img src="images/青空.jpg" class="img-thumbnail" alt="thumbnailOfReports">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card-body">
                        <h3><a href="reports.html">天気の研究</a></h3>
                        <h4><a href="users.html">表示名</a></h4>
                        <h4>〇年〇月〇日 投稿</h4>
                        <p>要約が表示されます</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
