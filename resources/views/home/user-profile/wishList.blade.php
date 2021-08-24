@extends('application')

@section('content')
    @include('/home/components/navbar_user')

    <div class="container">
        <div class="shopping-cart mt-4">
            <h5>My wish list</h5>
            @if ($test == 0)
                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" type="button" class="btn btn-info text-white">
                        Your WishList is Empty! Go Shopping ?
                    </a>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="p-2">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
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
                                                        {{ $item->name }}
                                                    </a>
                                                </td>
                                                <td>$ {{ $item->price }}</td>

                                                <td>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
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
