@extends('main')

@section('content')
    <h1 class="h-3 my-4 text-center">投稿一覧</h1>
    @if($users->lore === 2 || $users->lore === 3)   
        <div class="text-center">
            <a href="{{ route('create') }}" class="h5 mb-2 btn btn-primary">投稿する</a>
        </div>
    @endif
    @if (session('posted'))
        <div class="text-center alert alert-success">
            {{ session('posted') }}
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

                        @can('admin')
                            <div class="form d-flex">
                                <a href="{{ route('post.edit', $post) }}" class="d-block btn btn-warning">編集</a>
                                <form class="d-block ms-3" action="{{ route('post.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('本当に削除しますか？')" class="btn btn-danger" type="submit">削除</button>
                                </form>
                            </div>
                        @endcan

                        @can('postsUser')
                            @if(auth()->id() === $post->user_id)
                                <div class="form d-flex">
                                    <a href="{{ route('post.edit', $post) }}" class="d-block btn btn-warning">編集</a>
                                    <form class="d-block ms-3" action="{{ route('post.destroy', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('本当に削除しますか？')" class="btn btn-danger" type="submit">削除</button>
                                    </form>
                                </div>
                            @endif                      
                        @endcan

                        @if ($post->created_at->gte(now()->subDays(3)))
                            <span class="badge bg-danger ms-2">NEW</span>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center">投稿がありません</p>
            @endforelse
        </div>
    </article>
@endsection