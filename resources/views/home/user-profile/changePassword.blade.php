@extends('application')

@section('content')

    @include('/home/components/navbar_user')
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-6">
                <div class="card cs-shadow border-0">
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-lg-12 text-center">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                @if ($message = Session::get('Error'))
                                    <div class="alert alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <form action="{{ route('confirm-change', $data_user->id) }}" method="POST"
                                    id="ChangePassword">
                                    @csrf
                                    <div class="form-group pb-3">
                                        <input id="1" type="password" name="oldpassword"
                                            class="form-control form-control-lg" placeholder="Old Password">
                                        {!! $errors->first('oldpassword', "<span class='text-danger'>:message</span>") !!}
                                    </div>
                                    <div class="form-group pb-3">
                                        <input id="2" type="password" name="newpassword" value=""
                                            class="form-control form-control-lg" placeholder="New Password">
                                        {!! $errors->first('newpassword', "<span class='text-danger'>:message</span>") !!}
                                    </div>
                                    <div class="form-group pb-3">
                                        <input id="3" type="password" name="confirmpassword" value=""
                                            class="form-control form-control-lg" placeholder="Confirm Password">
                                        {!! $errors->first('confirmpassword', "<span class='text-danger'>:message</span>") !!}
                                    </div>
                                    <button type="submit" class="btn btn-primary col-12 ">
                                        <div class="p-1">
                                            Change
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
