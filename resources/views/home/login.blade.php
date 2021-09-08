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
            <div class="col-md-4">
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
                    <div class="card cs-shadow rounded border-0">
                        <div class="card-body">
                            <h4 class="pb-3 text-center">
                                Login   
                            </h4>
                            <input class="form-control form-control-lg mb-3" type="number" placeholder="Phone Number" name="phone"
                                id="exampleInputPhone" @if (Cookie::has('userPhone')) value="{{ Cookie::get('userPhone') }}" @endif>
                            <div class="input-group mb-3  password">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                    name="password" @if (Cookie::has('userPass')) value="{{ Cookie::get('userPass') }}" @endif placeholder="Password"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="visibility3()"
                                        id="button-addon2">
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
                </form>
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
