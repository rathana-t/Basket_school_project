@extends('seller\seller')

@section('sidebar-content')
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Image</th>
                <th scope="col">NO.</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quality</th>
                <th scope="col">Total price</th>
                <th scope="col">OrderDate</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="seller-list text-center">
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>
                    <a href="">
                        <button class="btn btn-primary">
                            Confirm
                        </button>
                    </a>
                    <a href="">
                        <button class="btn btn-danger">
                            Delete
                        </button>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
