@extends('seller\seller')


@section('sidebar-content')

    <div id="id01" class="modal">
        <div class="container">
            <div class="alert alert-warning" role="alert">
                <p>Are you sure! you want to logout?</p>
                <div class="d-flex justify-content-center">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="btn btn-secondary">Cancel</button>
                    <form action="/logout_seller" method="GET">
                        <button type="submit" onclick="document.getElementById('id01').style.display='none'"
                            class="btn btn-danger">LogOut</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="text-center seller-profile-name">
            <h1 class="font-weight-bold">
                {{ $data_seller->store_name }}
                <button style="float: right" class="btn btn-danger"
                    onclick="document.getElementById('id01').style.display='block'">
                    LogOut
                </button>
            </h1>
        </div>
    </div>

    <body>

        <div class="container background-color mt-2">
            <div class="row pl-3 pr-3 pt-3 pb-3">
                <div class="col-md-5 profile-column">
                    <div class="card text-center">
                        <img src="/images/sellerProfile/{{ $data_seller->profile }}" alt="" class="img-fluid mt-4"
                            style="object-fit:contain;">
                        <label for="exampleFormControlFile1">
                            <form action="{{ url('/seller/editImage') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group profile-text-style">
                                    <label for="exampleFormControlFile1" class="mt-2">
                                        @if ($data_seller->profile == '')
                                            Upload Photo
                                        @else
                                            Change Photo
                                        @endif
                                    </label>
                                    <input type="file" name="imageFile" style="display: none" id="exampleFormControlFile1"
                                        onchange="javascript:this.form.submit();" />
                                </div>
                            </form>
                        </label>
                        {{-- <input type="file" id="exampleFormControlFile1" style="display:none"> --}}
                    </div>
                </div>
                <div class="col-md-7 seller-info">
                    <div class="card">
                        <div class="m-4">
                            <div class="border-bottom d-flex justify-content-between">
                                <h1>Seller Info</h1>
                                <a href="">
                                    <img src="/images/logo/edit.svg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="shop-info mt-3">
                                <h1>Shop Name</h1>
                                <p class="text-left info-text"> {{ $data_seller->store_name }}</p>
                                <h1>Email</h1>
                                <p class="text-left info-text"> {{ $data_seller->email }}</p>
                                <h1>Phone number</h1>
                                <p class="text-left info-text">{{ $data_seller->phone }}</p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-3 pl-3 pr-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="m-4 seller-address">
                                <div class="border-bottom d-flex justify-content-between address">
                                    <h1>Seller Info</h1>
                                    <a href="{{ url('/seller/editProfile') }}">
                                        <img src="/images/logo/edit.svg" alt="" class="img-fluid">
                                    </a>
                                </div>

                                <div class="address-info mt-3">
                                    <h1>Street Address</h1>
                                    <p class="text-left info-text"> {{ $data_seller->address }}</p>
                                    <h1>Joined PLP at</h1>
                                    <p class="text-left info-text"> {{ $data_seller->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>

    </script>
@stop
