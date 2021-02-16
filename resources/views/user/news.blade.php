@extends('layouts.app')

@section('title','タイムライン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user/news.css') }}">
@endsection

@include('parts.navbar')

@section('content')

<div class="container">

    <div class="card">
        
        @if(count($reactions)==0)
        <p class="text">未承認の投稿はありません</p>
        @endif

        @foreach ($reactions as $reaction)
        <div class="card-body">

            <div class="card-body-left">
                <p class="text">・いいよ！されている投稿があります</p>
            </div>

            <div class="card-body-right">
                <a class="button" href="/timeline/{{$reaction->post_id}}">元の投稿へ</a>
            </div>

        </div>
        @endforeach
    </div>
</div>

@endsection