@extends('application')

@section('content')

    <style>
        .cs-shadow {
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }

        .cs-shadow button {
            /* width: 550px; */

        }

        .remember label {
            color: rgba(90, 90, 90, 0.979)
        }

        .forget a {
            text-decoration: none;
            font-size: 14px;
        }

        .cs-shadow .btn-outline-secondary {
            border: 1px solid #ced4da !important;
            border-left: none !important;
        }

        .password input {
            border-right: none !important;
        }

        .password .btn-outline-secondary:hover {
            color: #05b63ac0;
            background-color: #ffffff;
            border-color: #ffffff;
        }

        .password .btn-outline-secondary:focus,
        .btn-outline-secondary:active {
            background-color: #ffffff !important;
            outline: none !important;
            box-shadow: none !important;
            border-color: #ffffff;
        }

    </style>
    <div class="container">
        <div class="row d-flex justify-content-center pt-4">
            <div class="col-md-5">
                <div class="card cs-shadow rounded border-0">
                    <div class="card-body">
                        <input class="form-control form-control-lg" type="text" placeholder="Email or Phone Number">
                        <div class="input-group mb-3 mt-3 password">
                            <input type="password" class="form-control form-control-lg" placeholder="Password"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary col-12">
                                <div class="p-1">
                                    Log In
                                </div>
                            </button>
                        </div>
                        <hr>
                        <div class="text-center">
                            <div class="col forget">
                                <a href="{{ url('/user_forget_pass') }}">Forget Password ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="login">
            <h1 class="text-center pt-4 mb-4">
                Login
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    @if (session('fail'))
                        <div class="text-danger" style="margin-left:25%">
                            {{ session('fail') }}
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="text-success text-center" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('signin') }}" method="POST">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="m-4">
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="number" {{-- okdfkfdj --}} class="form-control" id="exampleInputPhone"
                                        name="phone" @if (Cookie::has('userPhone')) value="{{ Cookie::get('userPhone') }}" @endif required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            name="password" @if (Cookie::has('userPass')) value="{{ Cookie::get('userPass') }}" @endif required>
                                        <span class="input-group-btn btn-outline-light" id="eyeSlash">
                                            <button class="btn btn-dark" onclick="visibility3()" type="button"><i
                                                    class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                        </span>
                                        <span class="input-group-btn  btn-outline-dark" id="eyeShow" style="display: none;">
                                            <button class="btn btn-dark reveal" onclick="visibility3()" type="button"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="remeberme" id="exampleCheck1"
                                        @if (Cookie::has('userPass')) checked   @else @endif>
                                    <label class="form-check-label" for="exampleCheck1">Remember me.</label>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/user_forget_pass') }}">Forget Password ?</a>
                                    </div>
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function visibility3() {
            var x = document.getElementById('exampleInputPassword1');
            if (x.type === 'password') {
                x.type = "text";
                $('#eyeShow').show();
                $('#eyeSlash').hide();
            } else {
                x.type = "password";
                $('#eyeShow').hide();
                $('#eyeSlash').show();
            }
        }
    </script>

@stop
