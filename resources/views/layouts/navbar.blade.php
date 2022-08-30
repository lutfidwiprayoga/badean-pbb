<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/"><i class="fa fa-home"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cari.pbb') }}"><i class="fa fa-file-circle-question"></i>
                            Pencarian
                            Data
                            PBB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-info-circle"></i> Informasi</a>
                    </li>
                @else
                    @if (Auth::user()->role == 'masyarakat')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/"><i class="fa fa-home"></i>
                                Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cari.pbb') }}"><i class="fa fa-file-circle-question"></i>
                                Pencarian Data PBB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-info-circle"></i> Informasi</a>
                        </li>
                    @elseif (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/"><i class="fa fa-home"></i>
                                Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('riwayatpbb.index') }}"><i
                                    class="fa fa-file-circle-question"></i> Pencarian Data PBB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kelolanop.index') }}"><i class="fa fa-edit"></i> Input
                                Data NOP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kelolapbb.index') }}"><i class="fa fa-edit"></i> Input
                                Data PBB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-info-circle"></i> Informasi</a>
                        </li>
                    @endif
                @endguest
            </ul>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-circle"></i> Login</a>
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
