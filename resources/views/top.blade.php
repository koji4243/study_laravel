<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
</head>
<body>
    <style>
        body{
            padding: 0;
            margin: 0;
            background: #f4f9ecff;
        }
        div{
            width: 320px;
            height: 160px;
            background: #fff;
            margin:80px auto;
            padding: 16px;
        }
        h1{
            text-align: center;
            color: #333333;
        }
        p{
            text-align: center;
        }
    </style>

    <div>
        <h1>トップページ</h1>
        <p>
            <a href="{{ route('login') }}">ログイン</a>する
        </p>
        <p>
            <a href="{{ route(('register')) }}">新規登録</a>
        </p>
    </div>
</body>
</html>