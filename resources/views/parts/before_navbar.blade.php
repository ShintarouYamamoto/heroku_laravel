<link rel="stylesheet" href="{{ asset('css/parts/before_navbar.css') }}">

<div class="nav">
    <div class="nav-container">

        <div class="nav-container-left">
            <div class="nav-rogo">
                <a href="/" class="rogo">
                    <p>ACCORD</p>
                </a>
            </div>
        </div>

        <div class="nav-container-right">

            <div class="nav-url nav-login">
                <a href="/login" class="nav-button">ログイン</a>
            </div>

            <div class="nav-url nav-register">
                <a href="/register" class="nav-button">新規登録</a>
            </div>

            <div class="nav-url nav-guest">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" class="form-email" name="email" value="test_user@accord.jp" autocomplete="email">

                    <input type="hidden" class="form-password" name="password" value="test0302" autocomplete="current-password">

                    <button type="submit" class="nav-button">
                        ゲスト
                    </button>
                </form>
            </div>


        </div>

    </div>
</div>