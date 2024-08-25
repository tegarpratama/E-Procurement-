<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <div class="logo mr-auto">
            <h1><a href="#">E-Procurement</a></h1>
        </div>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                @if (session('jwt_token'))
                    @if (session('role') == 'admin')
                        <li class="#">
                            <a href="{{ Route('users') }}">
                                <i class='bx bx-user bx-sm'></i>
                            </a>
                        </li>
                    @endif
                    <li class="#">
                        <a href="{{ Route('products') }}"><i class='bx bx-package bx-sm'></i></a>
                    </li>
                    <li class="drop-down">
                        <a href="#">{{ session('name') }}</a>
                        <ul>
                            <li>
                                <a href="{{ Route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ Route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>
