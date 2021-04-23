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
                    <a class="nav-link nav-border{{ request()->is('categories') ? ' active' : '' }}"
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
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('cart') }}">
                        <img src="/images/ic_cart.svg" alt="" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-login px-4 py-2" href="{{ route('login') }}">Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-register px-4 py-2" href="{{ route('register') }}">Daftar</a>
                </li>
            </ul>

            <!-- Mobile -->
            <ul class="navbar-nav ml-auto d-block d-lg-none mt-2">
                <li class="nav-item">
                    <a class="btn btn-secondary search-link" href="{{ route('search') }}">
                        <img src="/images/ic_search.svg" width="23" height="23" alt="" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pt-3" href="{{ route('cart') }}">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-login px-4 py-2" href="{{ route('login') }}">Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-register px-4 py-2" href="{{ route('register') }}">Daftar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
