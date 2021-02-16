@extends('layouts.app')

@section('title','タイムライン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/chat/chat_list.css') }}">
@endsection

@include('parts.navbar')

@section('content')

<div class="container">

    <div class="card">
        
        @if(count($chatusers)==0)
        <p>いません</p>
        @endif

        @foreach ($chatusers as $chatuser)
        <div class="card-body">

            <div class="card-body-left">
                <a href="/user/{{$chatuser->user->id}}">
                    <p class="">
                        <img class="" src="{{ asset('storage/user_images/' . $chatuser->user->profile_image) }}" alt="user" />
                    </p>
                </a>
                <p class="">{{ $chatuser->user->name }}</p>
            </div>

            <div class="card-body-right">
                <a class="button" href="/timeline/{{$chatuser->chatroom->post_id}}">元の投稿へ</a>
                <a class="button" href="/chat/{{$chatuser->chat_room_id}}">トークルームへ</a>
            </div>

        </div>
        @endforeach
    </div>
</div>

@endsection