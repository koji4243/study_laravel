<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <style>
        body{
            padding: 0;
            margin: 0;
            background: #979794ff;
            opacity: 8;
        }
        .container{
            width: 320px;
            background: #ffffff;
            margin:80px auto;
            padding:8px 16px;
        }
        h3{
            text-align: center;
            color: #333333;
        }
        p{
            text-align: center;
        }
        .item{
            text-align: center;
        }
        label{
            margin-right: 4px
        }
        button{
            display: block;
            margin: 8px auto;
            cursor: pointer;
            background: #5f64eeff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding:4px 8px;
        }
        .errors{
            width: 280px;
            text-align: left;
            background: #f6eeeeff;
            color: #fc2c2cff;
            margin: 0 auto;
        }
    </style>

    <div class="container">
            <h3>ログイン</h3>
        <div>
            @if ($errors->any())
                <div class="errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div>
            <form action="{{ route('auth') }}" method="post">
                @csrf
                <div class="item">
                    <label for="email">メールアドレス</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}">
                </div>
                <div class="item">
                    <label for="pass">　　パスワード</label>
                    <input id="pass" name="password" type="password" value="{{ old('pass') }}">
                </div>
                <button type="submit">ログインする</button>
            </form>
        </div>
    </div>
</body>
</html>