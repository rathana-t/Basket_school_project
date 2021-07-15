@extends('application')

@section('content')
    <div class="top-sale">
        <div class="container hero-text">
            <h1>
                Top Sale
            </h1>
            <p>
                The Most Sale Last Week
            </p>
        </div>
    </div>

    {{-- <div class="container-fluid">
        <div class="recently-add">
            <h1>
                Recently add:
            </h1>
            <div class="row">
                @for ($i = 0; $i < 7; $i++)
                    <div class="text-center">
                        <div class="col-md">
                            <img src="/images/image5.svg" alt="" class="image-fluid">
                            <p> MacBook Pro 2021 </p>
                            <p class="custom-margin"> 2099$ </p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div> --}}

    <div class="container">
        <div class="all-pro">
            <h1>
                All Products:
            </h1>
            <div class="row">
                @for ($i = 0; $i < 50; $i++)
                    <div class="text-center">
                        <div class="col-md">
                            <img src="/images/image5.svg" alt="" class="img-fluid">
                            <p> MacBook Pro 2021 </p>
                            <p class="custom-margin"> 2099$ </p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="mt-5">

    </div>
@stop
