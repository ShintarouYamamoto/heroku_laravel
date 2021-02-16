@extends('layouts.app')

@section('title','トップページ')

@include('parts.before_navbar')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection



@section('content')

<div class="container">

    <div class="introduce">
        <img src="{{ asset('/images/background1.jpg') }}" alt="">
        <p class="text1">OOするからOOしてほしい！</p>
        <p class="text2">学生はタスケアイが基本。</p>
        <p class="text3">分からないこと、貸して欲しいものは頼んでみよう</p>
        <p class="text4">ただ、その時は自分も相手を助けよう。</p>
    </div>

    <div class="card-container">

        @foreach ($posts as $post)
        <a href="timeline/{{ $post->id }}">
            <div class="card">

                <div class="card-header-name">
                    <p class="profile-image inline-block"><img class="image" src="{{ asset('storage/user_images/' . $post->user->profile_image) }}" alt="user" /></p>
                    <p class="name inline-block">{{ $post->user->name }}</p>
                </div>

                <div class="card-header-university">
                    <p class="university inline-block">{{ $post->user->university }}</p>
                </div>

                <div class="card-body">
                    <div class="text">
                        <p class="help">{{ $post->help }}</p>
                    </div>

                    <div class="text">
                        <p class="sample-text">から、</p>
                    </div>

                    <div class="text">
                        <p class="desire">{{ $post->desire }}</p>
                    </div>
                </div>

            </div>
        </a>
        @endforeach
    </div>
</div>

@endsection