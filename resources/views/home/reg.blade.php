@extends('application')


@section('content')
    <div class="container">
        <div class="login pt-4">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="card cs-shadow rounded border-0">
                            <div class="card-body">
                                <h4 class="pb-3">
                                    Sign Up
                                </h4>
                                <div class="form-group pb-3">
                                    <small class="form-text text-muted pb-2">
                                        You Can Change Your name Later.
                                    </small>
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1"
                                        name="username" value="{{ old('username') }}" placeholder="Real Name">
                                    {!! $errors->first('username', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="form-group pb-3">
                                    <input type="number" class="form-control form-control-lg" id="exampleInputPhone"
                                        name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
                                    {!! $errors->first('phone', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                {{-- <div class="form-group pb-3">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                        name="password" placeholder="Password">
                                    {!! $errors->first('password', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="form-group pb-3">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                        name="con_password" placeholder="Confirm Password">
                                    {!! $errors->first('con_password', "<span class='text-danger'>:message</span>") !!}
                                </div> --}}
                                {{-- <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me!</label>
                                </div> --}}

                                <div class="form-row pb-4">
                                    <div class="col">
                                        <input type="password" class="form-control form-control-lg"
                                            id="exampleInputPassword1" name="password" placeholder="Password">
                                        {!! $errors->first('password', "<span class='text-danger'>:message</span>") !!}
                                    </div>
                                    <div class="col">
                                        <input type="password" class="form-control form-control-lg"
                                            id="exampleInputPassword1" name="con_password" placeholder="Confirm Password">
                                        {!! $errors->first('con_password', "<span class='text-danger'>This Field Is Required.</span>") !!}
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-lg btn-primary col-12 mb-3">
                                    Sign UP
                                </button>
                                <small class="form-text text-muted">
                                    By clicking the 'Sign Up' button, you confirm that you accept our <a target="blank"
                                        href="/Term_and_Condition/user"> Terms of use and
                                        Privacy Policy.</a>
                                </small>
                                <hr>
                                <div class="text-center">
                                    Have Account?
                                    <span>
                                        <a href="/login">
                                            Log In
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
