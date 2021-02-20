@extends('layouts.app')

@section('title','タイムライン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/post/timeline.css') }}">
@endsection

@include('parts.navbar')

@section('content')


<div class="container">
    @foreach ($posts as $post)
    <a href="timeline/{{ $post->id }}">
        <div class="card">

            <div class="card-header-name">
                <p class="profile-image inline-block">
                    <img class="image" src="{{ $post->user->profile_image }}" alt="user" />
                </p>
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


@endsection