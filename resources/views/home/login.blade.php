@extends('application')

@section('content')
    <div class="container">
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
                    <form action="{{ route('signin') }}" method="POST">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="m-4">
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="number" {{-- okdfkfdj --}} class="form-control" id="exampleInputPhone"
                                        name="phone" @if (Cookie::has('userPhone')) value="{{ Cookie::get('userPhone') }}" @endif
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                        @if (Cookie::has('userPass')) value="{{ Cookie::get('userPass') }}" @endif
                                        required>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="remeberme" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me!</label>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a href="">Forget Password ?</a>
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
@stop
