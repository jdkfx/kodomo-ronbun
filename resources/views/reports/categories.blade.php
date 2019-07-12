@extends('layouts.app')
@section('content')
    <div id="navigation" class="select-top">
        <?php $selected = 'category'; ?>
        <select v-on:change="jump">
            <option value="/" @if($selected == 'new') selected @endif>新着</option>
            <!-- <option value="/" @if($selected == 'recommend') selected @endif>おすすめ</option> -->
            <option value="/categories" @if($selected == 'category') selected @endif>カテゴリ</option>
        </select>
    </div>
    <div class="reportsIndex">
        <div class="listOfCategory">
            <div class="row">
                <div class="col-lg-3 mb-5">
                    <a href="/categories/1">
                        <div class="card">
                            <img src="images/植物.jpg" class="card-img-top" alt="植物（しょくぶつ）">
                            <p class="card-title text-center" style="font-size:20px;">植物（しょくぶつ）</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-5">
                    <a href="/categories/2">
                        <div class="card">
                            <img src="images/カブトムシ.jpg" class="card-img-top" alt="昆虫（こんちゅう）">
                            <p class="card-title text-center" style="font-size:20px;">昆虫（こんちゅう）</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-5">
                    <a href="/categories/3">
                        <div class="card">
                            <img src="images/動物.jpg" class="card-img-top" alt="動物（どうぶつ）">
                            <p class="card-title text-center" style="font-size:20px;">動物（どうぶつ）</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-5">
                    <a href="/categories/4">
                        <div class="card">
                            <img src="images/物質.jpg" class="card-img-top" alt="物質（ぶっしつ）">
                            <p class="card-title text-center" style="font-size:20px;">物質（ぶっしつ）</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-5">
                    <a href="/categories/5">
                        <div class="card">
                            <img src="images/宇宙.jpg" class="card-img-top" alt="宇宙（うちゅう）">
                            <p class="card-title text-center" style="font-size:20px;">宇宙（うちゅう）</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-5">
                    <a href="/categories/6">
                        <div class="card">
                            <img src="images/カブトムシ.jpg" class="card-img-top" alt="音（おと）">
                            <p class="card-title text-center" style="font-size:20px;">音（おと）</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-5">
                    <a href="/categories/7">
                        <div class="card">
                            <img src="images/カブトムシ.jpg" class="card-img-top" alt="重力（じゅうりょく）">
                            <p class="card-title text-center" style="font-size:20px;">重力（じゅうりょく）</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-5">
                    <a href="/categories/8">
                        <div class="card">
                            <img src="images/青空.jpg" class="card-img-top" alt="天気（てんき）">
                            <p class="card-title text-center" style="font-size:20px;">天気（てんき）</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-5">
                    <a href="/categories/9">
                        <div class="card">
                            <img src="images/磁石.jpg" class="card-img-top" alt="磁石（じしゃく）">
                            <p class="card-title text-center" style="font-size:20px;">磁石（じしゃく）</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-5">
                    <a href="/categories/10">
                        <div class="card">
                            <img src="images/電気.jpg" class="card-img-top" alt="電気（でんき）">
                            <p class="card-title text-center" style="font-size:20px;">電気（でんき）</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-5">
                    <a href="/categories/11">
                        <div class="card">
                            <img src="images/化石.jpg" class="card-img-top" alt="大地（だいち）">
                            <p class="card-title text-center" style="font-size:20px;">大地（だいち）</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-5">
                    <a href="/categories/0">
                        <div class="card">
                            <img src="images/青空.jpg" class="card-img-top" alt="その他（そのほか）">
                            <p class="card-title text-center" style="font-size:20px;">その他（そのほか）</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
