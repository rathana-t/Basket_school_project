<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
            fill="currentColor" class="bi bi-bootstrap-fill" viewBox="0 0 18 18">
            <path
                d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z" />
            <path
                d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396H5.062z" />
        </svg> | B A S K E T</a>
        
        <a class="navbar-brand" href="{{ url('/blog') }}">|  Blog</a>
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
