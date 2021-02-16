<link rel="stylesheet" href="{{ asset('css/parts/navbar.css') }}">

<div class="nav">
    <div class="nav-container">

        <div class="nav-container-left">
            <div class="nav-rogo">
                <a href="/timeline" class="rogo"><p>ACCORD</p></a>
            </div>
        </div>


        <div class="nav-container-right">

            <div class="nav-url mypage">
                <a href="/user/{{ Auth::user()->id }}" class="nav-icon">
                    <img class="nav-image" src="{{ asset('storage/user_images/' . Auth::user()->profile_image) }}" alt="user" />
                </a>
            </div>

            <div class="nav-url chat">
                <a href="/chat" class="nav-icon fas fa-comments fa-fw"></a>
            </div>

            <div class="nav-url news">
                <a href="/news" class="nav-icon fas fa-bell fa-fw"></a>
            </div>

            <div class="nav-url new">
                <a href="/new" class="nav-icon fas fa-edit fa-fw"></a>
            </div>

        </div>

    </div>
</div>