@extends('layouts.app')

@section('title','タイムライン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/post/detail.css') }}">
@endsection

@include('parts.navbar')

@section('content')


<div class="container">

    <div class="card">

        <div class="card-header-name">
            <div class="item">
                <a href="/user/{{ $post->user_id }}">
                    <p class="profile-image inline-block"><img class="image" src="{{ asset('storage/user_images/' . $post->user->profile_image) }}" alt="user" /></p>
                </a>
                <p class="name inline-block">{{ $post->user->name }}</p>
            </div>
            <div class="item">
                @if( $post->user_id == Auth::user()->id)
                <a class="delete-icon" href="/timeline/{{ $post->id }}/delete"><i class="fas fa-trash-alt fa-fw"></i></a>
                @endif
            </div>
        </div>

        <div class="card-header-university">
            <p class="university inline-block">{{ $post->user->university }}</p>
        </div>

        <div class='card-love'>
            @if ($post->likedBy(Auth::user())->count() == 0)
            <a class="far fa-heart fa-fw" href="/like/store/{{ $post->id }}"></a><p>{{$post->likes->count()}}</p>
            @else
            <a class="fas fa-heart fa-fw" href="/like/delete/{{ $post->id }}"></a><p>{{$post->likes->count()}}</p>
            @endif
        </div>

        <div class="card-body">
            <div class="center">
                <p class="help">{{ $post->help }}</p>
            </div>

            <div class="center">
                <p class="sample-text">ので、</p>
            </div>

            <div class="center">
                <p class="desire">{{ $post->desire }}</p>
            </div>

            <div class='center'>
                @if( $post->user_id != Auth::user()->id && $post->reactionBy($post->id)->count() == 0)
                <a href="/reaction/store/{{ $post->id }}" class="ok-button">いいよ！</a>
                @elseif($post->user_id != Auth::user()->id && $post->reactionBy($post->id)->count() != 0)
                <a href="/reaction/delete/{{ $post->id }}" class="ok-button">いいよ！を取り消す</a>
                @elseif($post->user_id == Auth::user()->id && $post->matchBy($post->id)->count() == 0)
                <a href="/reaction/list/{{ $post->id }}" class="ok-button">いいよ！してくれた人を見る</a>
                @else
                <p class="match-text">MATCH！</p>
                @endif
            </div>
        </div>

    </div>

    <div class="card">

        <div class="card-comeent">
            <div class="card-comment-show">
                @foreach ($post->comments as $comment)
                <p>{{$comment->user->name}} : {{$comment->comment}}</p>
                @endforeach
            </div>
        </div>

        <div class="comment-form">

            <form class="form-group" id="new_comment" action="/comment/store/{{$post->id}}" accept-charset="UTF-8" data-remote="true" method="post">
                {{csrf_field()}}
                <input value="{{ $post->id }}" type="hidden" name="post_id" />
                <textarea class="form-control comment-input" placeholder="コメント" type="text" name="comment" cols="50" rows="2"></textarea>

                <div class="center">
                    <button type="submit" class="submit-button">
                        送信
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection