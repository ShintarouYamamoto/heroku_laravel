@extends('layouts.app')

@section('title','マイページ')

@include('parts.navbar')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user/show.css') }}">
@endsection

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">
            <p class="card-title inline-block">基本情報</p>
            <div>
                @if ($user->id == Auth::user()->id)
                <a href="/user/{{ Auth::user()->id }}/edit" class="edit-button">編集</a>
                <a class="logout-button" rel="nofollow" data-method="POST" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                @elseif($user->followBy(Auth::user())->count() == 0)
                <a href="/user/{{$user->id}}/follow" class="follow-button">フォローする</a>
                @else
                <a href="/user/{{$user->id}}/unfollow" class="follow-button">フォロー解除</a>
                @endif
            </div>
        </div>

        <div class="card-body">
            <p class="inline-block">
                <img class="image" src="{{ asset('storage/user_images/' . $user->profile_image) }}" alt="user" />
            </p>
            <div class="infomation inline-block">
                <p><i class="fas fa-user fa-fw"></i> {{ $user->name }}</p>
                <p><i class="fas fa-school fa-fw"></i> {{ $user->university }}</p>
                <p class="follow"><a class="follow-list" href="/user/{{$user->id}}/following_list">フォロー {{ $user->follow_from_count($user->id) }}</a> <a class="follow-list" href="/user/{{$user->id}}/followers_list">フォロワー {{ $user->follow_to_count($user->id) }}</a></p>
            </div>
        </div>

        <div class="card-header">
            <p class="card-title inline-block">自己紹介</p>
        </div>

        <div class="card-body">
            <p class="profile">
                {{ $user->profile }}
            </p>
        </div>

        <div class="card-header">
            <p class="card-title inline-block">投稿一覧</p>
        </div>

        <div class="card-body post">

            <div class="post-container">
                @foreach ($posts as $post)
                <a class="post-url" href="/timeline/{{ $post->id }}">
                    <div class="post-card">

                        <div class="post-card-header-name">
                            <p class="post-profile-image inline-block">
                                <img class="post-image" src="{{ asset('storage/user_images/' . $post->user->profile_image) }}" alt="user" />
                            </p>
                            <p class="post-name inline-block">{{ $post->user->name }}</p>
                        </div>

                        <div class="post-card-header-university">
                            <p class="post-university inline-block">{{ $post->user->university }}</p>
                        </div>

                        <div class="post-card-body">
                            <div class="post-text">
                                <p class="post-help">{{ $post->help }}</p>
                            </div>

                            <div class="post-text">
                                <p class="post-sample-text">から、</p>
                            </div>

                            <div class="post-text">
                                <p class="post-desire">{{ $post->desire }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </div>




    @endsection