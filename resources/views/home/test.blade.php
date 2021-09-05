@extends('application')

@section('content')
    <style>
        .home-img img {
            height: 500px;
            object-fit: cover;
        }

    </style>
    <div class="container">
        <div class="home-img">
            <form action="{{ route('qqq') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <img src="/images/home/{{ $homeImg->img1 }}" alt="" class="img-fluid">
                        <input type="file" name="img1">
                    </div>
                    <div class="col-md-4">
                        <img src="/images/home/{{ $homeImg->img2 }}" alt="" class="img-fluid">
                        <input type="file" name="img2">
                    </div>
                    <div class="col-md-4">
                        <img src="/images/home/{{ $homeImg->img3 }}" alt="" class="img-fluid">
                        <input type="file" name="img3">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Change</button>
                </div>
            </form>
        </div>
    </div>
@stop
