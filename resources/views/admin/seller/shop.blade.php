@extends('admin\admin')

@section('sidebar-content')

    @include('/admin/components/modal')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="dashboard">
        <div class="small-card">
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ url('/admin/shop') }}">
                        <div class="card shadow-sm rounded bg-dark">
                            <div class="card-body text-white">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 class="q">
                                            Shop
                                        </h5>
                                        <div>
                                            {{ $sellersCount }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
                    <a href="{{ url('/admin/shopPending') }}">
                        <div class="card shadow-sm rounded bg-light">
                            <div class="card-body text-dark">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 class="q">
                                            Pending
                                        </h5>
                                        <div>
                                            {{ $sellerspending }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 cs-shadow rounded">
        <div style="min-height: 500px">
            <table class="table table-hover table-borderless">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Shop</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phonenumber</th>
                        <th scope="col">Address</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellers as $item)
                        <tr class="seller-list">
                            <td class="text-center">
                                {{ $item->id }}
                            </td>
                            <td class="text-center">
                                @if ($item->profile == '')
                                    <a href="seller/{{ $item->id }}">
                                        <img src="/img_null.jpg" alt="" class="img-fluid">
                                    </a>
                                @else
                                    <a href="seller/{{ $item->id }}">
                                        <img src="/images/sellerProfile/{{ $item->profile }}" alt=""
                                            class="img-fluid">
                                    </a>
                                @endif
                            </td>

                            <td class="text-center">
                                <div class="short">
                                    {{ $item->store_name }}
                                </div>
                            </td>
                            <td>
                                <div class="short">
                                    {{ $item->email }}
                                </div>
                            </td>
                            <td>
                                {{ $item->phone }}
                            </td>
                            <td>
                                <div class="short Address" style="cursor: pointer">
                                    {{ $item->address }}
                                </div>
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td>
                                <a href="seller/{{ $item->id }}">
                                    <button type="button" class="btn btn-sm btn-outline-dark">View</button>
                                </a>
                                <button type="button" class="btn btn-sm btn-dark remove_seller_id"
                                    value="{{ $item->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pl-2">
            {{ $sellers->links() }}
        </div>
    </div>
    <div class="modal fade" id="delete_seller" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Are you are sure you want to delete this shop?
                    <br>
                    All products will also delete.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{ url('/admin/deleteSeller') }}" method="post">

                        @csrf
                        <input hidden id="remove_seller" name="id">
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.remove_seller_id', function() {
                var seller_id = $(this).val();
                // alert(cart_id);
                $('#delete_seller').modal('show');
                $('#remove_seller').val(seller_id);
            })
        });
    </script>
@endsection
