@extends('layouts.app')

@section('title','タイムライン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/post/reaction.css') }}">
@endsection

@include('parts.navbar')

@section('content')


<div class="container">

    <div class="card">
        @if(count($reactions)==0)
        <p>いません</p>
        @endif
        
        @foreach ($reactions as $reaction)
        <div class="card-body">

            <div class="card-body-left">
                <p class="">
                    <img class="" src="{{ asset('storage/user_images/' . $reaction->fromUserId->profile_image) }}" alt="user" />
                </p>

                <p class="">{{ $reaction->fromUserId->name }}</p>
            </div>

            <div class="card-body-right">
                <a class="button" href="/reaction/list/{{$reaction->id}}/permit">この人にお願いする</a>
            </div>

        </div>
        @endforeach
    </div>
</div>


@endsection