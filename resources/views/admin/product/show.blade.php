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
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Send report
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data" action="{{ route('sendMsg') }}">
            @csrf
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
                            <input type="hidden" value="{{ $item->seller_id }}" name="seller_id">
                            <input type="hidden" value="1" name="sent">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Message</label>
                                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="msg"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach



@stop
