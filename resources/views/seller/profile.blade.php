@extends('layouts\sidebar')

@section('sidebar-content')
    <style>
        .top-con {
            background: #EDEBFA;
            margin: auto;
            border-radius: 20px 20px 0 0;
        }

        .bot-con {
            background: #EDEBFA;
            margin: auto;
            border-radius: 0 0 20px 20px;
        }

        .seller-info {
            border-radius: 20px;
            margin: 40px 40px 40px 20px;
        }

        .address-info {
            border-radius: 20px;
            margin: 40px;
        }

        .info .seller-text {
            font-size: 15px;
            font-style: normal;
            font-weight: normal;
            color: #747474;
        }

        .info .info-text {
            font-style: normal;
            font-weight: bold;
            font-size: 17px;
        }

        .blue-style {
            color: #2637AC;
        }

        .profile-column {
            border-radius: 20px;
            margin: 40px 20px 40px 40px;
        }

    </style>



    {{-- <button class="btn btn-danger" onclick="document.getElementById('id01').style.display='block'">Log Out</button> --}}

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
        <div class="text-left">
            <h1 class="blue-style font-weight-bold">
                Welcome back
            </h1>
            <p class="font-weight-normal">to seller profile page</p>

        </div>
    </div>

    <body style="background:#FAF7F7;">
        <div class="container top-con">
            <div class="row">
                <div class="col-md-3 text-center bg-white profile-column">
                    <img src="https://wallpaperaccess.com/full/3143683.jpg" class="rounded-circle img-fluid m-5"
                        height="160" width="160">
                    <form>
                        <div class="form-group info">
                            <label for="exampleFormControlFile1" class="blue-style"><img
                                    src="/images/logo/camera.png">Upload or
                                Change
                                Logo</label>
                            <input type="file" id="exampleFormControlFile1" style="display:none">
                        </div>
                    </form>
                </div>
                <div class="col-md-7 bg-white info seller-info">
                    <div class="d-flex border-bottom">
                        <div class="p-2 des-margin blue-style">Seller Info</div>
                        <div class="ml-auto p-2">
                            <a href="#">
                                <img src="/images/logo/editbutton.png">
                            </a>
                        </div>
                    </div>
                    <p class="text-left seller-text">Shop Name</p>
                    <p class="text-left info-text"> {{ $data_seller->store_name }}</p>
                    <p class="text-left seller-text">Shop Email</p>
                    <p class="text-left info-text"> {{ $data_seller->email }}</p>
                    <p class="text-left seller-text">Phone Number</p>
                    <p class="text-left info-text">{{ $data_seller->phone }}</p>
                </div>
            </div>
        </div>
        <div class="container bot-con">
            <div class="row">

                <div class="col-md-11 text-center bg-white address-info">
                    <div class="d-flex border-bottom">
                        <div class="p-2 des-margin blue-style">Address</div>
                        <div class="ml-auto p-2">
                            <a href="#">
                                <img src="/images/logo/editbutton.png">
                            </a>
                        </div>
                    </div>
                    <div class="d-flex info">
                        <div class="mr-auto p-2">
                            <p class="text-left seller-text">Street Address</p>
                            <p class="text-left info-text">#</p>
                            <p class="text-left seller-text">District</p>
                            <p class="text-left info-text">#</p>
                            <p class="text-left seller-text">City</p>
                            <p class="text-left info-text"> {{ $data_seller->address }}</p>
                        </div>
                        <div class="p-2">
                            <p class="text-left seller-text">Location on map</p>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6359.796438368111!2d104.95586413968906!3d11.532785336907889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095722fff8e3e1%3A0x4dacb3eec06b304e!2sBorey%20Peng%20Huoth%20The%20Star%20Platinum%20Polaris%201!5e0!3m2!1sen!2skh!4v1626972849172!5m2!1sen!2skh"
                                width="600" height="300" style="border-radius:10px;" allowfullscreen=""
                                loading="lazy"></iframe>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div style="height: 400px"></div>
    </body>



    <script>
        var modal = document.getElementById('id01');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@stop
