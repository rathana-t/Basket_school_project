@extends('blog/layout')

@section('content')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">


    <div class="container">
        <div class="login">
            <h1 class="text-center mt-5 mb-4">
                Login
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
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
                    <form action="{{ url('sellerLogIn') }}" method="POST">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="m-4">
                                <div class="form-group">
                                    <label for="phone">Email or Phone number</label>
                                    <input type="text" class="form-control" id="exampleInputPhone" name="email_phone"
                                        @if (Cookie::has('sellerPhone'))
                                    value="{{ Cookie::get('sellerPhone') }}"
                                @elseif (Cookie::has('sellerEmail')) value="{{ Cookie::get('sellerEmail') }}"
                                    @endif required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            name="password" @if (Cookie::has('sellerPass')) value="{{ Cookie::get('sellerPass') }}" @endif required>
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
                                        @if (Cookie::has('sellerPass')) checked   @else @endif>
                                    <label class="form-check-label" for="exampleCheck1">Remember me.</label>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/forget_pass') }}">Forget Password ?</a>
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
