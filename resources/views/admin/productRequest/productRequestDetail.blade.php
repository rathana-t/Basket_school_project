@extends('admin\admin')

@section('sidebar-content')

    @foreach ($detail_pro as $item)
        <div class="deatail_page mt-5">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                            class="img-fluid p-4">
                        <div class="p-2">
                            <div class="wrapper">

                                @if ($item->sub_img1)
                                    <div class="col-md-4">
                                        <div class="Item mb-2 card">
                                            <div class="p-2">
                                                <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img1 }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($item->sub_img2)
                                    <div class="col-md-4">
                                        <div class="Item mb-2 card">
                                            <div class="p-2">
                                                <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img2 }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($item->sub_img3)
                                    <div class="col-md-4">
                                        <div class="Item mb-2 card">
                                            <div class="p-2">
                                                <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img3 }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($item->sub_img4)
                                    <div class="col-md-4">
                                        <div class="Item mb-2 card">
                                            <div class="p-2">
                                                <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img4 }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($item->sub_img5)
                                    <div class="col-md-4">
                                        <div class="Item mb-2 card">
                                            <div class="p-2">
                                                <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img5 }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($item->sub_img6)
                                    <div class="col-md-4">
                                        <div class="Item mb-2 card">
                                            <div class="p-2">
                                                <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img6 }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($item->sub_img7)
                                    <div class="col-md-4">
                                        <div class="Item mb-2 card">
                                            <div class="p-2">
                                                <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img7 }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endif


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
                                <button type="button" class="btn btn-success" style="margin-right:100px "
                                    data-toggle="modal" data-target="#confirm_product">
                                    Confirm
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#reject_product">
                                    Reject
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="reject_product" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        Reject this product ?
                    </div>
                    <form action="{{ url('/admin/productRequestReject', $item->id) }}" method="POST">
                        @csrf
                        <input type="text" name="msg" class="text-center" id="" placeholder="message send to store"
                            required>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirm_product" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        Confirm this product ?
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
