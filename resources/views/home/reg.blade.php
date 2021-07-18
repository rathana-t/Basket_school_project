@extends('application')

@section('content')
    <div class="container mt-3">
        <div class="login">
            <h1 class="text-center mt-5 mb-4">
                Register
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('success')}}
                    </div>
                @elseif(Session::has('failed'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('failed')}}
                    </div>
                @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="m-4">
                                <div class="form-group">
                                    <label for="text">Real name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" value="{{ old('username') }}">
                                    {!! $errors->first("username", "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="phone" value="{{ old('phone') }}">
                                    {!!$errors->first("phone", "<span class='text-danger'>:message</span>")!!}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                    {!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="con_password">
                                    {!!$errors->first("con_password", "<span class='text-danger'>:message</span>")!!}
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
