<section class="navigation d-flex no-gap">
    <nav id="navbar" class="fl-pc-2 fl-vt-0 fl-mb-0">
        <div class="hamburger">
            <div class="icon" id="hamburger-icon">
                <ion-icon name="menu-sharp"></ion-icon>
            </div>
        </div>
        <div class="menu">
            <ul>
                <li><span><ion-icon name="cellular-outline"></ion-icon></span>Dashboard</li>
                {{-- <li class="dropdown"><span>
                    <ion-icon name="menu-sharp"></ion-icon></span>Dashboard
                    <ul class="dropdown-menu">
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                    </ul>
                </li>
                <li class="dropdown"><span>
                    <ion-icon name="menu-sharp"></ion-icon></span>Dashboard
                    <ul class="dropdown-menu">
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </nav>
    <div id="workplace" class="workplace fl-pc-10 fl-vt-12 fl-mb-12">
        <header>

        </header>
        <div class="workplace-section">
            <h1>{{ $title }}</h1>
            @yield('content')
        </div>
    </div>
</section>