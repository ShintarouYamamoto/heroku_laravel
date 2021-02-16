@extends('layouts.app')

@section('title','編集ページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user/edit.css') }}">
@endsection

@include('parts.navbar')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-body">

            <div class="text-area">
                <h1 class="text">編集する</h1>
                @if(count($errors)>0)
                <p class="error">エラーがあります</p>
                @endif
                <p class="error">{{ $message }}</p>
            </div>


            <form enctype="multipart/form-data" action="/user/{{ Auth::user()->id }}/edit" accept-charset="UTF-8" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}" />

                <div class="form-group">
                    <p>プロフィール画像</p>
                    @if ($user->profile_image)
                    <p>
                        <img class="image" src="{{ asset('storage/user_images/' . $user->profile_image) }}" alt="user" />
                    </p>
                    @endif
                    <input type="file" name="profile_image" value="{{ old('user_profile_image',$user->id) }}" accept="image/jpeg,image/gif,image/png" />
                    @error('profile_image')
                    <p class='error'>空欄不可</p>
                    @enderror
                </div>

                <div class="form-group">
                    <p>名前</p>
                    <input class="form-name" placeholder="名前" type="text" value="{{ old('user_name',$user->name) }}" name="name" />
                    @error('name')
                    <p class='error'>空欄不可</p>
                    @enderror
                </div>

                <div class="form-group">
                    <p>大学名</p>
                    <input class="form-university" placeholder="大学名" type="text" value="{{ old('user_university',$user->university) }}" name="university" />
                    @error('university')
                    <p class='error'>空欄不可</p>
                    @enderror
                </div>

                <div class="form-group">
                    <p>自己紹介文</p>
                    <textarea class="form-profile" placeholder="自己紹介文" type="text" name="profile" cols="50" rows="10">{{ old('user_profile',$user->profile) }}</textarea>
                </div>

                <div class="form-group">
                    <p>メールアドレス</p>
                    <input class="form-email" placeholder="メールアドレス" type="email" value="{{ old('user_email',$user->email) }}" name="email" />
                </div>
                @error('email')
                <p class='error'>空欄不可</p>
                @enderror

                <div class="form-group">
                    <button type="submit" class="submit-button">
                        変更する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection