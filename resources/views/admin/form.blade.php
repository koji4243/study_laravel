@extends('main')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-sm-4 mx-auto m-2">
                <h5>どのユーザーの権限を変更しますか？</h5>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('formSend') }}" method="post">
                    @csrf
                    <select name="userId" id="changeUsers">
                        <option value="">ユーザーを選択</option>
                        @foreach ($changeUsers as $user)
                            <option
                                value="{{ $user->id }}"
                                data-name="{{ $user->name }}"
                                data-lore="{{ $user->lore }}"
                            >
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    <hr>

                    <div id="roleArea" style="display:none;">
                        <p>名前：<span id="userName"></span></p>
                        <p>
                            現在の権限：
                            <strong id="userRole"></strong>
                        </p>

                        <label>権限：</label>
                        <select name="changeRole">
                            @for ($i = 1; $i <= $users->lore; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <div class="d-inline ms-1">
                            <button class="btn btn-secondary" type="submit">へ変更する</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>

    <script>
        const userSelect = document.getElementById('changeUsers');
        const roleArea = document.getElementById('roleArea');

        userSelect.addEventListener('change', function () {
            const option = this.options[this.selectedIndex];
            const lore = option.dataset.lore; // ← lore 取得
            if (!option.value) {
                return;
            }

            document.getElementById('userName').textContent = option.dataset.name;
            document.getElementById('userRole').value = option.dataset.lore;
            document.getElementById('userRole').textContent = lore;

            roleArea.style.display = 'block';
        });
    </script>
@endsection