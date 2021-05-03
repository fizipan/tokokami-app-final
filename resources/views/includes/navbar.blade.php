<nav class="navbar navbar-expand-lg navbar-light navbar-shop fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/images/logo-tokokami.svg" alt="" />
            TokoKami.com
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link nav-border{{ request()->is('/') ? ' active' : '' }}"
                        href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-border{{ request()->is('categories*') ? ' active' : '' }}"
                        href="{{ route('categories') }}">Produk</a>
                </li>
            </ul>

            <!-- Desktop -->
            <ul class="navbar-nav ml-auto d-none d-lg-flex align-items-center">
                <li class="nav-item">
                    <a class="btn btn-secondary search-link" href="{{ route('search') }}">
                        <img src="/images/ic_search.svg" width="23" height="23" alt="" />
                    </a>
                </li>
                @auth
                <li class="nav-item">
                    @php
                        $cartCount = \App\Models\Cart::where('users_id', Auth::user()->id)
                                                        ->where('selected', 1)
                                                        ->get()
                                                        ->reduce(function($carry, $item) {
                                                            return $carry + $item->amount;
                                                        });
                    @endphp
                    <a class="nav-link px-3 position-relative" href="{{ route('cart') }}">
                        <img src="/images/ic_cart.svg" alt="" />
                        @if ($cartCount > 0)
                            <div class="cart-badge">{{ $cartCount }}</div>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <div class="divider"></div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        @isset(Auth::user()->photo)
                            <img src="{{ Storage::url(Auth::user()->photo) }}" alt="profile" class="rounded-circle mr-2 profile-picture" />
                        @else
                            <img src="/images/pic_default.svg" alt="profile" class="rounded-circle mr-2 profile-picture" />
                        @endisset
                        Hi, {{ explode(' ', Auth::user()->name)[0] }}
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('order') }}" class="dropdown-item">Pembelian</a>
                        <a href="{{ route('profile') }}" class="dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link px-3 position-relative" href="{{ route('login') }}">
                        <img src="/images/ic_cart.svg" alt="" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-login px-4 py-2" href="{{ route('login') }}">Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-register px-4 py-2" href="{{ route('register') }}">Daftar</a>
                </li>
                @endauth
            </ul>

            <!-- Mobile -->
            <ul class="navbar-nav ml-auto d-block d-lg-none mt-2">
                <li class="nav-item">
                    <a class="btn btn-secondary search-link" href="{{ route('search') }}">
                        <img src="/images/ic_search.svg" width="23" height="23" alt="" />
                    </a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link pt-3 position-relative" href="{{ route('cart') }}"> 
                    @if ($cartCount > 0)
                        <div class="cart-badge">{{ $cartCount }}</div>
                    @endif
                        Keranjang 
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        @isset(Auth::user()->photo)
                            <img src="{{ Storage::url(Auth::user()->photo) }}" alt="profile" class="rounded-circle mr-2 profile-picture" />
                        @else
                            <img src="/images/pic_default.svg" alt="profile" class="rounded-circle mr-2 profile-picture" />
                        @endisset
                        Hi, {{ explode(' ', Auth::user()->name)[0] }}
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('order') }}" class="dropdown-item">Pembelian</a>
                        <a href="{{ route('profile') }}" class="dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link pt-3 position-relative" href="{{ route('login') }}">
                        Keranjang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-login px-4 py-2" href="{{ route('login') }}">Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-register px-4 py-2" href="{{ route('register') }}">Daftar</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
