@extends('application')

@section('content')
    @include('/home/components/navbar_user')

    @include('/admin/components/modal')

    <div class="container text-center">
        <h4>MY WISHLIST</h4>
        @include('/admin/components/msg')

        @if ($test == 0)

            <div class="text-center mt-4">
                <a href="{{ url('/') }}" type="button" class="btn btn-info">
                    Your WishList is Empty! Go Shopping ?
                </a>
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="wish-list">
                    @foreach ($data_pro as $item)
                        <tr>
                            <td class="img-modify">
                                <button class="btn btn-white"><?php foreach (json_decode($item->img_product)as $picture) { ?>
                                    <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt=""
                                        class="img-fluid">
                                    <?php break; } ?>
                                </button>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>$ {{ $item->price }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>
                                <a href="{{ url('/product', $item->id) }}" type="button" class="btn-sm btn btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                    View
                                </a>
                                <button type="button" value="{{ $item->wish_id }}"
                                    class="btn-sm remove_wishlist btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                        </path>
                                    </svg>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

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
