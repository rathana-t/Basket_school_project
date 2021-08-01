@extends('application')
@section('content');

    <!------ Include the above in your HEAD tag ---------->


    <div class="container">
        <p>
            <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                aria-controls="collapseExample">
                Filter
            </a>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="row">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-4 list-style">
                            <ul>
                                <h5 class="border-bottom">ProductName</h5>
                                <li><a href="#">Cras justo odio</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 list-style">
                            <ul>
                                <h5 class="border-bottom">Price</h5>
                                <li><a href="#">Cras justo odio</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 list-style">
                            <ul>
                                <h5 class="border-bottom">Brand Name</h5>
                                <li><a href="#">Cras justo odio</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 list-style">
                            <ul>
                                <h5 class="border-bottom">Product</h5>
                                <li><a href="#">Cras justo odio</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row ml-5">
            <div class="col-md-3">
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
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="card shadow-sm">
                <div class="m-3">
                    @foreach ($data as $item)
                        <p>{{ $item->name }}</p>
                        <div class="text-center">
                            <img src="/images/imgProduct/{{ $item->img_product }}" alt="" class="mb-1">
                        </div>
                        <a href="">See all</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--container end.//-->


@endsection
