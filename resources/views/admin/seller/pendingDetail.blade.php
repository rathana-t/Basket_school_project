@extends('admin\admin')

@section('sidebar-content')

    {{-- @foreach ($seller as $item) --}}

    <div class="deatail_page mt-5">
        <div class="card">
            <div class="row">
                <div class="col-md-6 border-right">
                    <img src="{{ asset('images/sellerImg1') }}/{{ $seller->img1 }}" alt="" class="img-fluid p-4">
                    <div class="p-2">
                        <div class="wrapper">

                            {{-- @if ($item->img1)
                                    <div class="col-md-4">
                                        <div class="Item mb-2 card">
                                            <div class="p-2">
                                                <img src="{{ asset('images/sellerImg1') }}/{{ $item->img1}}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endif --}}
                            @if ($seller->img2)
                                <div class="col-md-4">
                                    <div class="Item mb-2 card">
                                        <div class="p-2">
                                            <img src="{{ asset('images/sellerImg2') }}/{{ $seller->img2 }}" alt=""
                                                class="img-fluid">
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
                            {{ $seller->store_name }}
                        </h2>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <strong>Store Name</strong>
                            </div>
                            <div class="col">
                                {{ $seller->store_name }}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <strong>Email</strong>
                            </div>
                            <div class="col">
                                {{ $seller->email }}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <strong>Phone Number</strong>
                            </div>
                            <div class="col">
                                {{ $seller->phone }}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <strong>Address</strong>
                            </div>
                            <div class="col">
                                {{ $seller->address }}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <strong>Request Date</strong>
                            </div>
                            <div class="col">
                                {{ $seller->created_at }}
                            </div>
                        </div>
                        <hr>
                        <div style="margin-top: 10px">
                            <button type="button" class="btn btn-success" style="margin-right:100px " data-toggle="modal"
                                data-target="#confirm_product">
                                Confirm
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reject_product">
                                Reject
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reject_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Reject this shop ?
                </div>
                <form action="/admin/shopreject/{{ $seller->id }}" method="POST">
                    @csrf
                    <input type="text" name="message" class="text-center" id="" placeholder="message send to store"
                        required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input hidden type="text" name="email" value="{{ $seller->email }}" id="">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Confirm this shop ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="/admin/shopconfirm/{{ $seller->id }}" method="post">
                        @csrf
                        <input hidden type="text" name="email" value="{{ $seller->email }}" id="">
                        <button type="submit" class="btn btn-success">
                            Confirm
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- @endforeach --}}
@stop
