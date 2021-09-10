@extends('seller\seller')


@section('sidebar-content')
    <div class="container">

        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show " id="hideMe2" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('acceptChange') }}" method="POST" id="ChangeInformation">
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Store Name</strong>
                                                <input type="text" class="form-control" name="store_name"
                                                    value="{{ $data_seller->store_name }}">
                                                {!! $errors->first('store_name', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Email</strong>
                                                <input name="email" type="text" class="form-control"
                                                    value="{{ $data_seller->email }}">
                                                {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}

                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Phone Number</strong>
                                                <input name="phone" type="text" class="form-control"
                                                    value="{{ $data_seller->phone }}">
                                                {!! $errors->first('phone', "<span class='text-danger'>:message</span>") !!}

                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong for="inputState">City/Province</strong>
                                                <select id="inputState" class="form-control" name="province">
                                                    @if ($data_seller->province_id == '')
                                                        <option value="" selected>Choose City/Province</option>
                                                    @endif
                                                    @foreach ($provinces as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $data_seller->province_id ? 'selected' : '' }}>
                                                            {{ $item->province }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {!! $errors->first('province', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Street Address</strong>
                                                <input name="address" type="text" class="form-control"
                                                    value="{{ $data_seller->address }}">
                                                {!! $errors->first('address', "<span class='text-danger'>:message</span>") !!}

                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-success">Change</button>
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
