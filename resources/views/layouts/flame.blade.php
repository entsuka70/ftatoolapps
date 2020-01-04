<!-- レイアウトの作成 -->

<!DOCTYPE html>
<html lang="ja">
  <head>
    <!-- 文字エンコード -->
    <meta charset="utf-8">
    <!-- Internet Explorer用の設定 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- レスポンシブ設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- メタディスクリプション設定 -->
    <meta name="description" content="ようこそFTATOOLへ。FTATOOLを用いてエラー解決を一緒に探しましょう！">
    <!-- OGPタグ/twitterカード設定 -->
    <meta property="og:url" content="https://ftatoolapps.herokuapp.com/">
    <meta property="og:title" content="FTATOLL / みんなのエラー解決投稿サイト">
    <meta property="og:type" content="website">
    <meta property="og:description" content="ようこそFTATOOLへ。FTATOOLを用いてエラー解決を一緒に探しましょう！">
    <meta property="og:image" content="{{ secure_asset('assets/img/FTATOOL.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@entsuka">
    <meta property="og:site_name" content="FTATOOL | みんなのエラー解決サイト">
    <meta property="og:locale" content="ja_JP">
    <!-- X-CSRF-TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- タイトルタグ -->
    <title>@yield('title')</title>
    <!-- ファビコン -->
    @if(app('env') == 'local')
    <link rel="shortcut icon" sizes="16x16" href="{{ asset('favicon.ico') }}">
    @endif
    @if(app('env') == 'production')
    <link rel="shortcut icon" sizes="16x16" href="{{ secure_asset('favicon.ico') }}">
    @endif
    <!-- CSS設定 -->
    @if(app('env') == 'local')
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @endif
    @if(app('env') == 'production')
    <link rel="stylesheet" href="{{ secure_asset('assets/css/app.css') }}">
    @endif
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.8/css/mdb.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
  </head>
  <body>
    <header class="header-contents mt-3">
      <div class="container headerbox">
        <div class="header-left">
          <h1>
            <a class="toptitle text-default font-weight-bold success-lighter-hover" href="{{ route('ftatool') }}">
              @yield('title')
            </a>
          </h1>
        </div>
        <ul class="header-right">
          @guest
          <li>
            <a class="mr-3 blue-grey-text" href="ftatool_description">FTATOOLとは</a>
          </li>
          <li>
            <a class="mr-3 blue-grey-text" href="implementationFunction">実装機能について</a>
          </li>
          <li>
            @if(app('env') == 'local')
            <img src="{{ asset('assets/img/profile_default.png') }}" alt="profile" width="40px" hieght="40px">          
            @endif
            @if(app('env') == 'production')
            <img src="{{ secure_asset('assets/img/profile_default.png') }}" alt="profile" width="40px" hieght="40px">
            @endif
          </li>
          <li>
            <button class="btn btn-primary" type="button" name="button">
              <a class="login" href="{{ route('login') }}">ログイン</a>
            </button>
          </li>
          @if(Route::has('register'))
          <li>
            <button class="btn btn-default" type="button" name="button">
              <a class="regist" href="{{ route('register') }}">ユーザー登録</a>
            </button>
          </li>
          @endif
          @else
          <li>
            @if($user->profile_fileName)
              <img src="{{ $user->profile_fileName }}" width="40px" height="40px" alt="プロフィール画像">
            @else
              @if(app('env') == 'local')
                <img src="{{ asset('assets/img/profile_default.png') }}" alt="プロフィール画像" width="40px" hieght="40px">
              @endif
              @if(app('env') == 'production')
                <img src="{{ secure_asset('assets/img/profile_default.png') }}" alt="プロフィール画像" width="40px" hieght="40px">
              @endif
            @endif
          </li>
          <li>
            <a href="profile">
              <button class="btn" type="button" name="button" >
                {{ Auth::user()->name }}
              </button>
            </a>
          </li>
          <li>
            <form class="" action="{{ route('logout') }}" method="post">
              @csrf
              <button class="btn btn-outline-default waves-effect" type="submit" name="button">
                ログアウト
              </button>
            </form>
          </li>
          @endguest
        </ul>
        <div id="nav-drawer">
          <input id="nav-input" type="checkbox" class="nav-unshown">
          <label id="nav-open" for="nav-input"><span></span></label>
          <label class="nav-unshown" id="nav-close" for="nav-input"></label>
          <div id="nav-content">
            <ul class="sp-header-right">
              @guest
              <li>
                <a class="mr-3 blue-grey-text" href="ftatool_description">FTATOOLとは</a>
              </li>
              <li>
                <a class="mr-3 blue-grey-text" href="implementationFunction">実装機能について</a>
              </li>
              <li>
                @if(app('env') == 'local')
                  <img src="{{ asset('assets/img/profile_default.png') }}" alt="プロフィール画像" width="40px" hieght="40px">
                @endif
                @if(app('env') == 'production')
                  <img src="{{ secure_asset('assets/img/profile_default.png') }}" alt="プロフィール画像" width="40px" hieght="40px">
                @endif
              </li>
              <li>
                <button class="btn btn-primary" type="button" name="button">
                  <a class="login" href="{{ route('login') }}">ログイン</a>
                </button>
              </li>
              @if(Route::has('register'))
              <li>
                <button class="btn btn-default" type="button" name="button">
                  <a class="regist" href="{{ route('register') }}">ユーザー登録</a>
                </button>
              </li>
              @endif
              @else
              <li>
                @if($user->profile_fileName)
                  <img src="{{ $user->profile_fileName }}" width="40px" height="40px" alt="プロフィール画像">
                @else
                  @if(app('env') == 'local')
                    <img src="{{ asset('assets/img/profile_default.png') }}" alt="プロフィール画像" width="40px" hieght="40px">
                  @endif
                  @if(app('env') == 'production')
                    <img src="{{ secure_asset('assets/img/profile_default.png') }}" alt="プロフィール画像" width="40px" hieght="40px">
                  @endif
                @endif
              </li>
              <li>
                <a href="profile">
                  <button class="btn" type="button" name="button" >
                    {{ Auth::user()->name }}
                  </button>
                </a>
              </li>
              <li>
                <form class="" action="{{ route('logout') }}" method="post">
                  @csrf
                  <button class="btn btn-outline-default waves-effect" type="submit" name="button">
                    ログアウト
                  </button>
                </form>
              </li>
              @endguest
            </ul>
          </div>
        </div>
      </div>
    </header>
    <!-- メインコンテンツはレイアウト外(views/ToDoApp/index)で作成 -->
    <main class="contents">
        @yield('content')
    </main>
    <footer>
      copyright entsuka 2019
    </footer>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- javascript読み込み -->
    @if(app('env') == 'local')
      <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
    @endif
    @if(app('env') == 'production')
      <script type="text/javascript" src="{{ secure_asset('assets/js/app.js') }}"></script>
    @endif
  </body>
</html>
