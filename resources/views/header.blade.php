<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 logo"><a href="/" style="color: black !important; font-size:50px;font-weight:bold">RFID</a></div>
            <div class="col-lg-6 action">
                @livewire('cart-counter')
                @if (session()->has('LoggedUser'))
                    {{ session()->get('LoggedUser')->name }}
                    <a href="{{ route('logout') }}">Thoát</a>
                @else
                    <a href="{{ route('register') }}">Đăng ký</a>
                    <a class="login" href="{{ route('login') }}">Đăng nhập</a>
                @endif
            </div>
        </div>
    </div>
</header>