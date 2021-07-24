<nav class="navbar navbar-expand-lg navbar-light p-2">
    <div class="container">
        <a class="navbar-brand logo" href="{{ url('/') }}">
            <img src="/images/logo/PLP.svg" alt="">
        </a>
        <ul class="navbar-nav ml-auto">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 search" type="search" placeholder="Search" aria-label="Search">
                <button type="button" class="btn btn-primary">Search</button>
            </form>
        </ul>

        <ul class="navbar-nav ml-auto etc">
            <li class="nav-item d-flex align-items-center">
                <a href="" class="pl-2">
                    <img src="/images/logo/heart.svg" alt="">
                </a>
            </li>
            <li class="nav-item d-flex align-items-center pl-2 pr-1">
                <a href="{{ url('/cart') }}">
                    <img src="/images/logo/cart.svg" alt="">
                </a>
            </li>
            @if (Session::has('user'))
                <li class="nav-item signup-a">
                    <a class="nav-link" href="{{ route('display-profile', $data_user->id) }}"><img style="width: 40px"
                            src="{{ URL::asset('profile.png') }}" alt=""></a>
                </li>
            @else
                <li class="nav-item signup-a">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item signup-a">
                    <a class="nav-link" href="{{ url('/reg') }}">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
