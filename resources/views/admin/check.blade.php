@extends('main')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-sm-4 mx-auto">
                <h5 class="text-center">下記の内容で変更しますか？</h5>
                <div class="w-50 text-start ms-5 mt-3 p-2">
                    <p>id　：{{ $changeRoleUser['id'] }}</p>
                    <p>名前：{{ $changeRoleUser['name'] }}</p>
                    <p>権限：{{ $changeRoleUser['lore'] }}</dd>　→　<span>{{ session ('changeRole.changeRole')}}</span></p>
                    <form action="{{ route('update') }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="userId" value="{{ $changeRoleUser['id'] }}">
                        <button class="d-block ms-auto btn btn-primary" type="submit">確定</button>
                    </form>
                </div>                
            </div>
        </div>
    </main>
@endsection