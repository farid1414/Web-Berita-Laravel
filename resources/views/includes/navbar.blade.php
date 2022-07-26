<ul class="nav bg-success bg-opacity-75 py-2">
    <div class="container">
        <li class="nav-item current-time  d-flex  justify-content-end align-items-center">
            Tanggal : 25 Juli 2022
        </li>
    </div>
</ul>

<div class="container">
    <nav class="navbar navbar-expand-lg mt-3 ">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
            </ul>
            <span class="navbar-text d-flex">
                @if (Auth()->user())
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            <li><a class="dropdown-item" href="{{ route('news.index') }}">Berita Saya</a></li>
                        </ul>
                    </div>
                @else
                    <div class="login">
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                    <div class="register">
                        <a href="{{ route('registrasi') }}">Register</a>
                    </div>
                @endif
            </span>
        </div>
    </nav>
</div>
<div class="border-navbar-bottom"></div>
