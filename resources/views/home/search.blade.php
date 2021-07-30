@extends('application')
@section('content');

    <!------ Include the above in your HEAD tag ---------->


    <div class="">
        <br>
        <p class="text-center">{{ 'query' }}<a href=""></a></p>
        <hr>


        <div class="row ml-5">
            <div class="col-md-4">
                <div class="card" style="width: 400px">
                    <div class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Brands </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <form>
                                    <label class="form-check">
                                        <div class="float-right badge badge-light round">52</div>
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
                                            Mersedes Benz
                                        </span>
                                    </label> <!-- form-check.// -->
                                </form>

                            </div> <!-- card-body.// -->
                        </div>
                    </div> <!-- card-group-item.// -->

                    <div class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Choose type </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                    <span class="form-check-label">
                                        First hand items
                                    </span>
                                </label>
                            </div> <!-- card-body.// -->
                        </div>
                    </div> <!-- card-group-item.// -->
                    <div class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Choose type </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                    <span class="form-check-label">
                                        First hand items
                                    </span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                    <span class="form-check-label">
                                        Brand new items
                                    </span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                    <span class="form-check-label">
                                        Some other option
                                    </span>
                                </label>
                            </div> <!-- card-body.// -->
                        </div>
                    </div> <!-- card-group-item.// -->
                    <div class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Similar category </h6>
                        </header>
                        <div class="filter-content">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item">Cras justo odio <span
                                        class="float-right badge badge-light round">142</span> </a>
                                <a href="#" class="list-group-item">Dapibus ac facilisis <span
                                        class="float-right badge badge-light round">3</span> </a>
                                <a href="#" class="list-group-item">Morbi leo risus <span
                                        class="float-right badge badge-light round">32</span> </a>
                                <a href="#" class="list-group-item">Another item <span
                                        class="float-right badge badge-light round">12</span> </a>
                            </div> <!-- list-group .// -->
                        </div>
                    </div>
                </div> <!-- card.// -->
            </div>
            <div class="mt-2 related-product">
                <p class="font-weight-light">All related Product</p>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <img src="" class="img-fluid">
                        <div>
                            <p class="text-left w-100">
                            </p>
                            <p class="custom-margin">#SRD123456</p>
                            <ul class="list-unstyled custom-margin" style="display:flex">
                                <li class="box" style="border:1px solid #000;background: #000;"></li>
                                <li class="box" style="border:1px solid silver;background: silver;"></li>
                            </ul>
                            <p class="text-danger custom-margin"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--container end.//-->


    @endsection
