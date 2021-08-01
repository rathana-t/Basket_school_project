@extends('application')
@section('content');
    <div class="container">
        @include('home/components/selectbyBrand')
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

        <div class="category mt-4">
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="card shadow-sm">
                            <div class="m-3">
                                <p>{{ $item->name }}</p>
                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                <img src="/images/imgProduct/{{ $picture }}" alt="" class="mb-1 img-fluid">
                                <?php break; } ?>
                                <a href="">See all</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
