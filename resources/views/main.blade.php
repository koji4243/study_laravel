<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>認証完了</title>
    <script src="https://kit.fontawesome.com/1d35c639f0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
    <style>
    .auth{
        color: #6aec59ff;
        font-weight: 700;
    }
    .box {
        width: 240px;
        height: 300px;
        margin: 24px auto;
        overflow: auto; 
        background: #ecf6f9ff;  
        padding: 16px;
        border-radius: 8px;
        box-shadow: 5px 5px 5px #e9e6e6ff;
        text-align: center;
        position: relative;
    }
    .form{
        position: absolute;
        bottom: 16px;
        left: 25%;
    }
    .user{
        font-size: .9rem;
        color: #554f4fff;
    }
    a{
        text-decoration: none;
    }
    </style>

<body>
    <section class="container">
        <div class="p-3 w-100 mt-4 d-flex justify-content-between">
            <div class="w-25">
                <h5>
                    <i class="auth fa-solid fa-check"></i>
                    　認証完了しました
                </h5>
                <p class="m-3">こんにちわ　{{ $users['name'] }}さん</p>
            </div>
            <form name="logout" class="d-block my-auto" method="post" action="{{ route('logout') }}">
                @csrf
                <a href="javascript:logout.submit()">ログアウト</a>
            </form>
        </div>
        @if ($users['lore'] === 3)
            <h1 class="h-3 my-4 text-center">管理者画面</h1>
        @else
            <h1 class="h-3 my-4 text-center">投稿一覧</h1>
        @endif

    @yield('content')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>