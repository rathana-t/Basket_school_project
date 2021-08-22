@extends('blog/layout')

@section('content')
    <div class="container">
        <div class="login">
            <h1 class="text-center mt-5 mb-4">
                Reset Password
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="POST" action="/reset-password" class="my-5">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label class="form-label">Your email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email" placeholder=" Enter email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password" placeholder=" Enter password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                autocomplete="new-password" placeholder=" Enter confirm password">
                            <div class="clearfix"></div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Confirm</button>
                    </form>
                    {{-- <!-- [ Form ] End --> --}}

                    <div class="text-center text-muted">
                        Already have an account?
                        <a href="{{ url('/sellerLogInPage') }}">Sign In</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
