@extends('layouts.app')

@section('title','タイムライン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/chat/chat_room.css') }}">
@endsection

@include('parts.navbar')

@section('content')

<div class="container">

    <div class="card-message">
        @foreach($chatmessages as $chatmessage)
        <div class="card-message-body">
            <div class="card-message-body-left">
                @if($chatmessage->user_id != Auth::user()->id)
                <p>
                    <img src="{{ asset('storage/user_images/' . $chatmessage->user->profile_image) }}" alt="user" />
                </p>
                <p class="message">{{ $chatmessage->message }}</p>
                @endif
            </div>
            <div class="card-message-body-right">
                @if($chatmessage->user_id == Auth::user()->id)
                <p class="message">{{ $chatmessage->message }}</p>
                <p>
                    <img src="{{ asset('storage/user_images/' . $chatmessage->user->profile_image) }}" alt="user" />
                </p>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <div class="card-input">

        <div class='card-input-body'>
            <form class="form-group" action="/chat/store/{{$chatuser->chat_room_id}}" accept-charset="UTF-8" data-remote="true" method="post">
                {{csrf_field()}}
                <input value="{{ $chatuser->chat_room_id }}" type="hidden" name="chat_room_id" />
                <textarea class="form-text" autofocus placeholder="メッセージ" type="text" name="message" cols="50" rows="3"></textarea>
                <button type="submit" class="button">送信</button>
            </form>
        </div>

    </div>

</div>

@endsection