@extends('admin\admin')

@section('sidebar-content')

    @foreach ($detail_pro as $item)
        <div class="deatail_page mt-5">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <?php foreach (json_decode($item->img_product)as $picture) { ?>
                        <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt="" class="img-fluid p-4">
                        <?php break; } ?>
                        <div class="p-2">
                            <div class="wrapper">
                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                <div class="col-md-4">
                                    <div class="Item mb-2 card">
                                        <div class="p-2">
                                            <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4">
                            <h2>
                                {{ $item->name }}
                            </h2>
                            <div class="price mb-3">
                                <h4>
                                    ${{ $item->price }}
                                </h4>
                            </div>
                            <p class="des">
                                {{ $item->description }}
                            </p>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <strong>Stock</strong>
                                </div>
                                <div class="col">
                                    {{ $item->stock }}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <strong>Store name</strong>
                                </div>
                                <div class="col">
                                    {{ $item->store_name }}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <strong>Store address</strong>
                                </div>
                                <div class="col">
                                    {{ $item->address }}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <strong>Brand</strong>
                                </div>
                                <div class="col">
                                    {{ $item->brand_name }}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <strong>Category</strong>
                                </div>
                                <div class="col">
                                    {{ $item->cat_name }}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <strong>Secondary category</strong>
                                </div>
                                <div class="col">
                                    {{ $item->secondCate }}
                                </div>
                            </div>
                            <hr>
                            <div style="margin-top: 10px">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#confirm_product">
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirm_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="/admin/productRequestUpdate/{{ $item->id }}" class="btn btn-success">
                            Confirm
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop
