@extends('seller\seller')

@section('sidebar-content')
    @include('/admin/components/modal')

    @include('seller\components\msg')

    @include('/seller/components/product')

    <div class="card border-0 shadow rounded mt-4">
        <div style="min-height: 500px">
            <table class="table table-hover table-borderless">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Stock</th>
                        <th scope="col" class="text-center">Request</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellerHasProduct as $item)
                        @if ($item->admin_reject == 1)
                            <tr class="product-list" style="background-color: rgb(199, 12, 12)">
                                <td class="text-center">
                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                        class="img-fluid">
                                </td>
                                <td style="color:white">
                                    {{ $item->name }}
                                </td>
                                <td class="text-center" style="color:white">
                                    ${{ $item->price }}
                                </td>
                                <td class="text-center" style="color:white">
                                    {{ $item->stock }} Items
                                </td>
                                <td class="text-center" style="color:white">
                                    Rejected
                                </td>
                                <td style="color:white">
                                    {{ $item->updated_at }}
                                </td>
                                <td>
                                    <button type="button" value="{{ $item->msg }}"
                                        class="btn btn-sm btn-dark show_message ">
                                        Read message
                                    </button>
                                    <a href="{{ route('edit_product', $item->id) }}">
                                        <button type="button" class="btn btn-sm  btn-outline-light">
                                            Edit
                                        </button>
                                    </a>
                                    <button type="button" value="{{ $item->id }}" class="deletebtn btn btn-sm btn-dark">
                                        Delete
                                    </button>
                                </td>
                            </tr>



                            <div class="modal fade" id="message" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card shadow-sm">
                                                <div class="p-4">
                                                    <div id="text_message"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $(document).on('click', '.show_message', function() {
                                        var msg = $(this).val();
                                        // alert(prod_id);
                                        $('#message').modal('show');
                                        $('#text_message').text(msg);
                                    })
                                });
                            </script>
                        @else
                            <tr class="product-list">
                                <td class="text-center">
                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                        class="img-fluid">
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td class="text-center">
                                    ${{ $item->price }}
                                </td>
                                <td class="text-center">
                                    {{ $item->stock }} Items
                                </td>
                                <td class="text-center">
                                    Pending
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    <a href="{{ route('edit_product', $item->id) }}">
                                        <button type="button" class="btn btn-sm  btn-outline-dark">
                                            Edit
                                        </button>
                                    </a>
                                    <button type="button" value="{{ $item->id }}"
                                        class="deletebtn btn btn-sm btn-dark">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pl-4">
            {{ $sellerHasProduct->links() }}
        </div>
    </div>

    {{-- <div style="min-height: 75vh">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Post at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sellerHasProduct as $item)
                    <tr class="product-list">
                        <td>
                            {{ ++$i }}
                        </td>
                        <td>
                            <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                class="img-fluid">
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->price }}
                        </td>
                        <td>
                            {{ $item->stock }}
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            <a href="{{ route('edit_product', $item->id) }}">
                                <button style="margin: 2px" type="button" class="btn btn-info">Edit</button>
                            </a>
                            <button style="margin: 2px" type="button" value="{{ $item->id }}"
                                class="deletebtn btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $sellerHasProduct->links() }} --}}

@stop
