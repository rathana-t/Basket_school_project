@extends('application')

@section('content')
    <div class="container">
        <div class="login">
            <h1 class="text-center mt-5 mb-4">
                Reset Password
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @if (session('message'))
                        <div class="text-success text-center" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form class="my-5" method="POST" action="/user_forget-password">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Your Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter email"
                                autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center m-0">
                            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
