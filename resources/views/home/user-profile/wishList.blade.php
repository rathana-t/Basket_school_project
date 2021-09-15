@extends('application')

@section('content')
    @include('/home/components/navbar_user')

    <div class="container">
        <div class="shopping-cart mt-4">

            @if ($test == 0)
                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" type="button" class="btn btn-info text-white">
                        Your WishList is Empty! Go Shopping ?
                    </a>
                </div>
            @else
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h5>My wish list</h5>
                        <div class="card mb-3 cs-shadow border-0">
                            <div class="p-2">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_pro as $item)
                                            <tr class="mb-3">
                                                <td>
                                                    <a href="{{ url('/product', $item->id) }}">
                                                        <img style="width: 100px;"
                                                            src="/images/imgProduct/{{ $item->img_product }}" alt=""
                                                            class="img-fluid">
                                                        <div class="b">
                                                            {{ $item->name }}
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>$ {{ $item->price }}</td>

                                                <td style="width: 350px;">
                                                    @if ($item->stock <= 0)
                                                        <button class="btn btn-sm btn-dark" style="width: 150px">
                                                            <span class="p-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-bag-x-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                                                                </svg>
                                                            </span>
                                                            No Stock
                                                        </button>
                                                    @else
                                                        <button type="button" value="{{ $item->id }}"
                                                            class="btn-sm submit_add_to_cart btn-light border"
                                                            style="width: 150px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-bag-check-fill"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                            </svg>
                                                            Add to cart
                                                        </button>
                                                    @endif
                                                    <a href="{{ url('/product', $item->id) }}" type="button"
                                                        class="btn-sm btn-light border btn">
                                                        View
                                                    </a>

                                                    <button type="button" value="{{ $item->wish_id }}"
                                                        class="btn-sm remove_wishlist btn-light border btn">
                                                        Remove
                                                    </button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.remove_wishlist', function() {
                var wish_id = $(this).val();
                // alert(cart_id);
                $('#remove_wish_modal').modal('show');
                $('#remove_wish_id').val(wish_id);
            })
        });
    </script>
@endsection
