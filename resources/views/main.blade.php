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
            <form name="logout" class="d-block" method="post" action="{{ route('logout') }}">
                @csrf
                <a href="javascript:logout.submit()">ログアウト</a>
            </form>
        </div>
        <h1 class="h-3 my-4 text-center">投稿一覧</h1>

        @if ($users['lore'] === 2)
            <div class="text-center">
                <a href="#" class="h5 btn btn-primary">投稿する</a>
            </div>
        @endif
        <hr>

        <article>
            <div class="row d-flex flex-wrap">
                @forelse($posts as $post)
                    <div class="col-sm-3">
                        <div class="box">
                            <p class="user">{{ $post->user->name }}さんからの投稿<i class="d-inlineblock ms-2 fa-regular fa-face-smile"></i></p>
                            <h6>{{ $post->title }}</h6>
                            <p class="mt-3">{{ $post->body }}</p>
                            <div class="form">
                                <form action="#" class="d-block d-flex">
                                    <button class="d-block btn btn-warning">編集</button>
                                    <button class="ms-3 d-block btn btn-danger">削除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">投稿がありません</p>
                @endforelse
            </div>
        </article>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>