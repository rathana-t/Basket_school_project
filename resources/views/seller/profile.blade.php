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

    <div class="container">
        <div class="background-color mt-2">
            <div class="p-3">
                <div class="row">
                    <div class="col-lg-5 profile-column">
                        <div class="card text-center">
                            <div class="p-4">
                                <img src="/images/sellerProfile/{{ $data_seller->profile }}" alt="" class="img-fluid">
                                <label for="exampleFormControlFile1">
                                    <form action="{{ url('/seller/editImage') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group profile-text-style">
                                            <label for="exampleFormControlFile1" class="mt-2">
                                                @if ($data_seller->profile == '')
                                                    Upload Photo
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            fill="currentColor" class="bi bi-card-image"
                                                            viewBox="0 0 16 16">
                                                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                            <path
                                                                d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z" />
                                                        </svg>
                                                    </span>
                                                @else
                                                    Change Photo
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            fill="currentColor" class="bi bi-card-image"
                                                            viewBox="0 0 16 16">
                                                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                            <path
                                                                d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z" />
                                                        </svg>
                                                    </span>
                                                @endif
                                            </label>
                                            <input type="file" name="imageFile" style="display: none"
                                                id="exampleFormControlFile1" onchange="javascript:this.form.submit();" />
                                        </div>
                                    </form>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 seller-info">
                        <div class="card">
                            <div class="p-4">
                                <div class="border-bottom d-flex justify-content-between">
                                    <h1>Seller Info</h1>
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg>
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

                <div class="row pt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="m-4 seller-address">
                                <div class="border-bottom d-flex justify-content-between address">
                                    <h1>Seller Info</h1>
                                    <a href="{{ url('/seller/editProfile') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg>
                                    </a>
                                </div>

                                <div class="address-info mt-3">
                                    <h1>Street Address</h1>
                                    <p class="text-left info-text"> {{ $data_seller->address }}</p>
                                    <h1>Joined PLP at</h1>
                                    <p class="text-left info-text"> {{ $data_seller->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-danger btn-sm mt-2" data-toggle="modal"
                        data-target="#exampleModal">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/logout_seller" class="btn btn-secondary">
                        logout
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
