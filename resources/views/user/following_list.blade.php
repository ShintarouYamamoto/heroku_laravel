@extends('layouts.app')

@section('title','フォローリスト')

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
                <a href="/user/{{$follow->followersId->id}}">
                    <p class="">
                        <img class="user-image" src="{{ $follow->followersId->profile_image }}" alt="user" />
                    </p>
                </a>
                <p class="">{{ $follow->followersId->name }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection