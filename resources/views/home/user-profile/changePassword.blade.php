@extends('application')

@section('content')

    @include('/home/components/navbar_user')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
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
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="1">Old Password</label>
                                                <input id="1" type="password" name="oldpassword" class="form-control"
                                                    placeholder="Old Password">
                                                {!! $errors->first('oldpassword', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="2">New Password</label>
                                                <input id="2" type="password" name="newpassword" value=""
                                                    class="form-control" placeholder="New Password">
                                                {!! $errors->first('newpassword', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="3">Confirm New Password</label>
                                                <input id="3" type="password" name="confirmpassword" value=""
                                                    class="form-control" placeholder="Confirm Password">
                                                {!! $errors->first('confirmpassword', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                            <button type="submit" class="btn btn-dark btn-sm">Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
