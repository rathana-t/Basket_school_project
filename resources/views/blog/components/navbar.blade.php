<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Home</a>
        <a class="navbar-brand" href="{{ url('/blog') }}">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if (Session::has('seller'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('seller/profile') }}"><img style="width: 40px"
                                src="{{ URL::asset('profile.png') }}" alt=""></a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('sellerLogInPage') }}">Login</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('sellerRegisterPage') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
