<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav2">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger">Make Invoice</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" data-toggle="modal" data-target="#portfolioModal1">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" data-toggle="modal" data-target="#portfolioModal2">Register</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('service.index') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('company.index') }}">Clients</a></li>
                    <li style="padding-top: 8px;">
                        <a href="{{ route('service.invoice') }}">Invoice
                            <span class="badge badge-pill badge-primary">{{ Session::has('invoice') ? Session::get('invoice')->totalQty : '' }}</span>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('message.index')}}">Messages</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropdownButton">
                            <a class="dropdown-item active" style="font-weight: bold; text-align: center;" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>

        </div>
    </div>
</nav>
