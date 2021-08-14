@extends('application')

@section('content')

    @include('/home/components/navbar_user')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
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
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whooops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}

                                <form action="{{ route('confirm-change', $data_user->id) }}" method="POST"
                                    id="ChangePassword">
                                    @csrf
                                    {{-- @method('PUT') --}}

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Old Password:</strong>
                                                <input type="password" name="oldpassword" class="form-control"
                                                    placeholder="Old Password">
                                                {!! $errors->first('oldpassword', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>New Password:</strong>
                                                <input type="password" name="newpassword" value="" class="form-control"
                                                    placeholder="New Password">
                                                {!! $errors->first('newpassword', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Confirm Password:</strong>
                                                <input type="password" name="confirmpassword" value="" class="form-control"
                                                    placeholder="Confirm Password">
                                                {!! $errors->first('confirmpassword', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-success">Submit</button>
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
