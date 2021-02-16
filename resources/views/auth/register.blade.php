@extends('layouts.app')

@section('title','新規登録')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')

<div class="container">

    <div class="card">
        <div class="card-body">

            <div class="text-area">
                <h1 class="text">新規登録する</h1>
                @if(count($errors)>0)
                <p class="error">エラーがあります</p>
                @endif
            </div>


            <div class="form-area">
                <form enctype="multipart/form-data" accept-charset="UTF-8" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <p>名前</p>
                        <input class="form-name" placeholder="名前" value="{{ old('name') }}" type="text" name="name" />
                        @error('name')
                        <p class='error'>入力されていません</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <p>大学名</p>
                        <input class="form-university" placeholder="大学名" value="{{ old('university') }}" type="text" name="university" />
                        @error('university')
                        <p class='error'>入力されていません</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <p>性別</p>
                        <label for="man"><input class="form-sex" type="radio" id="man" value="男" name="sex" />男</label>
                        <label for="woman"><input class="form-sex" type="radio" id="woman" value="女" name="sex" />女</label>
                        <label for="unknown"><input class="form-sex" type="radio" id="unknown" value="設定なし" name="sex" />設定しない</label>
                        @error('sex')
                        <p class='error'>入力されていません</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <p>メールアドレス</p>
                        <input class="form-email" placeholder="メールアドレス" type="email" name="email" value="{{ old('email') }}" />
                    </div>
                    @error('email')
                    <p class='error'>入力されていません</p>
                    @enderror

                    <div class="form-group">
                        <p>パスワード</p>
                        <input type="password" class="form-password" placeholder="パスワード" name="password" autocomplete="current-password">
                        @error('password')
                        <p class='error'>入力されていません</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <p>確認用パスワード</p>
                        <input id="password-confirm" class="form-password" type="password" class="password-confirm-box" placeholder="確認用パスワード" name="password_confirmation" autocomplete="new-password">
                        @error('password')
                        <p class='error'>入力されていません</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <button type="submit" class="submit-button">
                            登録
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection