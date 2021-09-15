@extends('application')
@section('content')
    @include('/home/components/navbar_user')
    <div class="container">
        <div class="login">
            <h1 class="text-center pt-4 mb-4">
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    @if (session('fail'))
                        <div class="text-danger text-center">
                            {{ session('fail') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="text-success text-center" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('accept') }}" method="POST">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="m-4">
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="number" {{-- okdfkfdj --}} class="form-control" id="exampleInputPhone"
                                        name="phone" value="{{ old('phone') }}" required>
                                    {!! $errors->first('phone', "<p class='thmenh text-danger'>:message</p>") !!}

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            name="password" required>
                                        {!! $errors->first('password', "<p class='thmenh text-danger'>:message</p>") !!}

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
                                <div class="row">

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
@endsection
