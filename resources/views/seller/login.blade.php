@extends('blog/layout')

@section('content')
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
                    <form action="{{ url('sellerLogIn') }}" method="POST">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="m-4">
                                <div class="form-group">
                                    <label for="phone">Email or Phone number</label>
                                    <input type="text" class="form-control" id="exampleInputPhone" name="email_phone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me!</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
