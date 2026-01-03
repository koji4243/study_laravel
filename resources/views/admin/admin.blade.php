@extends('main')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-sm-3 mx-auto">
                <h1 class="h-3 my-4 text-center">管理者画面</h1>

                @if (session('message'))
                    <div class="text-center alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <p class="text-center">
                    <a href="{{ route('edit') }}">ユーザーの権限を変更する</a>
                </p>
                <p class="text-center">
                    <a href="{{ route('main') }}">投稿ページへいく</a>
                </p>
            </div>
        </div>
    </main>
@endsection