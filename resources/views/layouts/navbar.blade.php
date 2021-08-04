<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <form class="input-group">
                        <input type="text" class="form-control"
                            aria-label="Dollar amount (with dot and two decimal places)" placeholder="Search....">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item cs-pt">
                        <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor"
                                class="bi bi-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                            </svg>
                        </a>
                    </li>
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor"
                            class="bi bi-bag-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            <path
                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                        </svg>
                    </a>
                    @if (Session::has('user'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('display-profile', $data_user->id) }}"><img
                                    style="width: 40px" src="{{ URL::asset('profile.png') }}" alt=""></a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/reg') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-light">
        <div class="container pl-0 pr-0 pt-2 pb-2">
            <nav class="nav">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Departments
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($second_cate as $item)
                        <a class="dropdown-item" href="#">{{ $item->name }}</a>
                    @endforeach
                </div>
                <a class="nav-link active" href="#">Brands</a>
                <a class="nav-link" href="#">Main Category</a>
                <a class="nav-link" href="#">Sub Category</a>
            </nav>
        </div>
    </div>
</div>
