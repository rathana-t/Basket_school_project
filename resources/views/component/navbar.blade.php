<nav class="navbar navbar-expand-lg navbar-light p-0 sticky-top">
    <div class="container">
        <a class="navbar-brand logo" href="{{url('/')}}">
            <img src="/images/logo/PLP.svg" alt="">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">KeyBoard</a>
                        <a class="dropdown-item" href="#">Mouse</a>
                        <a class="dropdown-item" href="#">Another action</a>
                    </div>
                </li>
                <li class="nav-item search">
                    <form action="">
                        <input style=" background-color: #EAF3FD ; " type="text" class="form-control"
                            id="formGroupExampleInput" placeholder="Search....">
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item cart-a mt-1">
                    <a class="nav-link" href="#"><img src="/images/logo/opencart.svg" alt=""></a>
                </li>
                
            @if(Session::has('user'))
                <li class="nav-item">
                  <a class="nav-link"  href="{{  route('display-profile',$data_user->id) }}"><img style="width: 40px" src="{{ URL::asset('profile.png') }}" alt=""></a>
                </li>
            @else
                <li class="nav-item signup-a ml-3">
                    <a class="nav-link" href="{{url('/login')}}">Login</a>
                </li>
                <li class="nav-item signup-a ml-3">
                    <a class="nav-link" href="{{url('/reg')}}">Register</a>
                </li>
            @endif

            </ul>
        </div>
    </div>
</nav>
