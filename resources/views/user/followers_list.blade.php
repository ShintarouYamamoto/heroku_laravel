@extends('layouts.app')

@section('title','フォロワーリスト')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user/follow.css') }}">
@endsection

@include('parts.navbar')

@section('content')

<div class="container">

    <div class="card">
        @if(count($follows)==0)
        <p>いません</p>
        @endif
        @foreach ($follows as $follow)
        <div class="card-body">
            <div class="card-body-left">
                <a href="/user/{{$follow->followingId->id}}">
                    <p class="">
                        <img class="user-image" src="{{ $follow->followingId->profile_image }}" alt="user" />
                    </p>
                </a>
                <p class="">{{ $follow->followingId->name }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection