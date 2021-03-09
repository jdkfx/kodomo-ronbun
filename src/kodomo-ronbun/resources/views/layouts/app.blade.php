<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>こどもろんぶん</title>
        <meta name="description" content="「こどもろんぶん」は、こどものための自由研究のろんぶん投稿サービスです。あなたの自由研究をのせてみませんか？「こどもろんぶん」ではたくさんの方からのろんぶんに対するフィードバックがもらえるかもしれません。もしかするとあなたの研究は新時代をきりひらく素晴らしいものかもしれません。">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    </head>
    <body>
        @include('commons.header')
        <div class="container">
            @yield('content')
        </div>
        <footer>
            <div class="container">
                <div class="text-center">
                    <p>こどもろんぶんとは</p>
                    <p><a href="https://twitter.com/jdkfx">お問い合わせ</a></p>
                    <p><a href="/terms">利用規約</a></p>
                    <p><a href="/policy">プライバシーポリシー</a></p>
                    <p>&copy; 2019 - 2020 Haruki Tazoe</p>
                </div>
            </div>
        </footer>
        @yield('js')
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="{{ asset('/js/main.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
