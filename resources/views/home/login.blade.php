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

        .thmenh {
            font-size: 15px;
        }

    </style>
    <div class="container">
        <div class="row d-flex justify-content-center pt-4">
            <div class="col-md-4">
                {{-- @if (Session::has('cate_add'))
                    <div class="text-danger text-center" role="alert">
                        {{ Session::get('cate_add') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif --}}
                @if (Session::has('fail'))
                    <div class="text-danger text-center" role="alert">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                {{-- @if (session('fail'))
                    <div class="text-danger text-center" role="alert">
                        {{ session('fail') }}
                    </div>
                @endif --}}
                @if (Session::has('message'))
                    <div class="text-success text-center" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <form action="{{ route('signin') }}" method="POST">
                    @csrf
                    <div class="card cs-shadow rounded border-0">
                        <div class="card-body">
                            <h4 class="pb-3 text-center">
                                Login
                            </h4>
                            {!! $errors->first('fail', "<span class='thmenh text-danger'>:message</span>") !!}

                            <input class=" form-control form-control-lg mb-3" type="number" placeholder="Phone Number"
                                name="phone" id="exampleInputPhone" @if (Cookie::has('userPhone')) value="{{ Cookie::get('userPhone') }}" @endif>
                            {!! $errors->first('phone', "<span class='thmenh text-danger'>:message</span>") !!}

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
                            {!! $errors->first('password', "<span class='thmenh text-danger'>:message</span>") !!}

                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-primary col-12">
                                    Log In
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
        $(function() {
            //id="login_form"
            $("#login_form").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.text-danger').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            $.ajax({
                                type: "GET",
                                url: "/",
                            });
                        }
                    }
                });
            });
        });


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
