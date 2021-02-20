@extends('layouts.app')

@section('title','チャットリスト')

@section('css')
<link rel="stylesheet" href="{{ asset('css/chat/chat_list.css') }}">
@endsection

@include('parts.navbar')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <p class="card-title">いいよ！したROOM</p>
        </div>

        @if($from_rooms->count()==0)
        <p　class="text">トークルームはありません</p>

        @elseif($from_rooms->count()!=0)
        @foreach ($from_rooms as $from_room)
        <div class="card-body">

            <div class="card-body-left">
                <a href="/user/{{$from_room->toUserId->id}}">
                    <p class="">
                        <img class="" src="{{ $from_room->toUserId->profile_image }}" alt="user" />
                    </p>
                </a>
                <p class="">{{ $from_room->toUserId->name }}</p>
            </div>

            <div class="card-body-right">
                <a class="button" href="/timeline/{{$from_room->postId->id}}">元の投稿へ</a>
                <a class="button" href="/chat/{{$from_room->chatId->id}}">トークルームへ</a>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <div class="card">
        <div class="card-header">
            <p class="card-title">いいよ！されたROOM</p>
        </div>

        @if($to_rooms->count()==0)
        <p　class="text">トークルームはありません</p>

        @elseif($to_rooms->count()!=0)
        @foreach ($to_rooms as $to_room)
        <div class="card-body">

            <div class="card-body-left">
                <a href="/user/{{$to_room->fromUserId->id}}">
                    <p class="">
                        <img class="" src="{{ $to_room->fromUserId->profile_image }}" alt="user" />
                    </p>
                </a>
                <p class="">{{ $to_room->fromUserId->name }}</p>
            </div>

            <div class="card-body-right">
                <a class="button" href="/timeline/{{$to_room->postId->id}}">元の投稿へ</a>
                <a class="button" href="/chat/{{$to_room->chatId->id}}">トークルームへ</a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

@endsection