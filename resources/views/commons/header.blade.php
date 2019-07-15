<header class="mb-2">
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" style="color:white;" href="/">こどもろんぶん</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <form class="form-inline ml-auto" action="/search">
                    <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="キーワードを入力" aria-label="Search">
                    <button class="btn my-2 my-sm-0" type="submit">検索</button>
                </form>
                <ul class="navbar-nav">
                    @if(Auth::check())
                        <li>
                            <div class="submit-report">
                                <a href="/reports/create" style="color:#ffffff;" class="btn my-2 my-sm-0 ml-lg-2">投稿</a>
                            </div>
                        </li>
                        <li>
                            <?php
                            $user = \Auth::user();
                            $user_detail = App\UserDetail::where('user_id',$user->id)->first();
                            ?>
                            <div class="dropdown ml-lg-2">
                                <button type="button" id="header-dropdown"
                                    class="btn dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                {{ $user_detail->display_name }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="header-dropdown">
                                    <a class="dropdown-item" href="/{{ $user->account_name }}">プロフィール</a>
                                    <a class="dropdown-item" href="/setting">アカウント設定</a>
                                    <a class="dropdown-item" href="/logout">ログアウト</a>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn ml-lg-2" style="background-color:#ff8c00;color:#ffffff;" href="/login">ログイン</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
