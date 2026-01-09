@extends('main')

@section('content')
    <main class="container">
        <div class="row">
            <div class="post col-sm-4 mx-auto">
                @if ($userflag === null)
                    <h3 class="h-5 my-2 text-center">投稿しよう</h3>
                @else
                    <h3 class="h-5 my-2 text-center">どのように編集しますか？</h3>
                @endif

                <a href="{{ route('main') }}" class="my-1 btn btn-outline-secondary">戻る</a>
                @if($userflag === true)
                    <small class="d-block text-center">{{ $posts[0]['user']['name'] }}さんからの投稿</small>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ $userflag === null ? route('post.store') : route('post.update', $post) }}" method="post">
                @csrf
                @if($userflag !== null)
                    @method('PUT')
                @endif
                    <div>
                        <label for="title" class="form-label">タイトル</label>
                        <input
                            id="title"
                            name="title"
                            class="form-control"
                            type="text"
                            value="{{ $posts[0]['title'] ?? "" }}"
                        >
                    </div>
                    <div>
                        <label for="body" class="mt-1 form-label">本文</label>
                        <textarea id="body" class="form-control d-block text-start p-1" name="body" rows="4">
                            {{ $posts[0]['body'] ?? "" }}
                        </textarea>
                    </div>
                    <button type="submit" class="d-block btn btn-primary ms-auto mt-2">送信する</button>
                </form>

            </div>
        </div>
    </main>
@endsection