@extends('layouts.app')

@section('title','投稿ページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/post/new.css') }}">
@endsection

@include('parts.navbar')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">

            <div class="text-area">
                <h1 class="text">投稿する</h1>
                @if(count($errors)>0)
                <p class="error">エラーがあります</p>
                @endif
            </div>

            <form enctype="multipart/form-data" action="/new" accept-charset="UTF-8" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}" />

                <div class="form-group">
                    <p><i class="fas fa-hand-holding-heart fa-fw"></i> 相手にしてあげること</p>
                    <textarea class="form-help" placeholder="～する/～教える/～あげる" type="text" name="help" cols="50" rows="2"></textarea>
                    @error('help')
                    <p class='error'>入力されていません</p>
                    @enderror
                </div>

                <p class="sample-text">から、</p>

                <div class="form-group">
                    <p><i class="fas fa-hands fa-fw"></i> 自分がしてもらうこと</p>
                    <textarea class="form-desire" placeholder="～してほしい/～が欲しい" type="text" name="desire" cols="50" rows="2"></textarea>
                    @error('desire')
                    <p class='error'>入力されていません</p>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="submit-button">
                        投稿
                    </button>
                </div>


            </form>
        </div>
    </div>
</div>


@endsection