<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cari.pbb') }}">Pencarian Data PBB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Informasi</a>
                    </li>
                @else
                    @if (Auth::user()->role == 'masyarakat')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cari.pbb') }}">Pencarian Data PBB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Informasi</a>
                        </li>
                    @elseif (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('riwayatpbb.index') }}">Pencarian Data PBB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kelolapbb.index') }}">Input Data PBB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Informasi</a>
                        </li>
                    @endif
                @endguest
            </ul>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <span class="navbar-text"></span>

                @endguest
            </ul>
        </div>
    </div>
</nav>
