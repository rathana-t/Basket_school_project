@extends('application')

@section('content')
    <div class="container mt-3">
        <div class="login">
            <h1 class="text-center mt-5 mb-4">
                Regiter
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="m-4">
                                <div class="form-group">
                                    <label for="text">Real name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="con_password">
                                </div>
                                {{-- <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me!</label>
                                </div> --}}

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
