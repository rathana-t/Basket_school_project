<?php
use App\Http\Controllers\HomeController;
if (Session::has('user')) {
    $total = HomeController::countCart();
    $totalWishlist = HomeController::countWishlist();
    $countMsg = HomeController::countMsg();
}
$listSecondCate = HomeController::secondCat();
?>

<style>
    .navbar .select select {
        width: 100px;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container mt-2 mb-2">
        <a class="navbar-brand" href="/"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                fill="currentColor" class="bi bi-bootstrap-fill" viewBox="0 0 18 18">
                <path
                    d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z" />
                <path
                    d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396H5.062z" />
            </svg> | B A S K E T</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <form class="input-group select" action="{{ url('/search') }}">
                    <select name="search_fill" class="form-control">
                        <option value="name">Name</option>
                        <option value="code">Code</option>
                    </select>
                    <input type="text" name="query" class="form-control"
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

                <li class="nav-item custom-pt">
                    <a class="nav-link" href="{{ url('wishlist') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg>
                        @if (Session::has('user'))
                            <span class="badge badge-primary badge-pill totalWishlist_for_me"
                                style="margin-left: -15px;">

                                {{ $totalWishlist }}

                            </span>
                        @endif

                    </a>
                </li>

                <a class="nav-link" href="{{ url('/cart') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor"
                        class="bi bi-bag-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        <path
                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                    </svg>
                    @if (Session::has('user'))
                        <span class="badge badge-primary badge-pill totalcart_for_me" style="margin-left: -15px;">
                            {{ $total }}
                        </span>
                    @endif
                </a>
                @if (Session::has('user'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('message') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                class="bi bi-envelope" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                            </svg>
                            <span class="badge badge-primary badge-pill" style="margin-left: -15px;">
                                {{ $countMsg }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('display-profile') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/reg') }}">Sign Up</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="navbar-menu border-top border-bottom">
    <div class="container pl-0 pr-0 pt-2 pb-2">
        <nav class="nav">
            {{-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Departments
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               
                <div class="container">
                    <div class="row">
                        <div class="col-xs-4 col-md-4 col-sm-4">
                            <div class="card">
                                <div class="p-3">
                                    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-4 col-sm-4">
                            <div class="card">
                                <div class="p-3">
                                    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-4 col-sm-4">
                            <div class="card">
                                <div class="p-3">
                                    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <a class="nav-link" href="/category">Main Category</a>
            <a class="nav-link" href="/smallcate">Sub Category</a>
            <a class="nav-link" href="/brand">Brands</a>
            <div class="ml-auto mr-3 cs-pc">
                <a href="{{ url('/CustomPC/Builder') }}" style="text-decoration: none">
                    <button class="nav-link text-white btn btn-sm btn-primary">
                        Custom PC Builder
                    </button>
                </a>
            </div>
        </nav>
    </div>
</div>
