@extends('application')

@section('content')

    @include('/home/components/navbar_user')
    <div class="container text-center">
        <h4>MY WISHLIST</h4>
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
                <tr>
                    <td class="img-modify">
                        <button class="btn btn-white"><img src="https://wallpaperaccess.com/full/3143683.jpg"
                                class="img-fluid"></button>
                    </td>
                    <td>Key Board</td>
                    <td>$10.00</td>
                    <td>10</td>
                    <td>
                        <button class="btn btn-primary">Add to
                            cart</button>
                        <button class="btn btn-danger">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
