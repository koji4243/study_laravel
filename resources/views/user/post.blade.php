@extends('main')

@section('content')
@can('admin')
    管理者だけ見える
@endcan
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
@endsection