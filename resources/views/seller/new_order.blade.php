@extends('seller\seller')

@section('sidebar-content')

    <style>
        .out-table {
            background-color: #EDEBFA;
            padding: 50px
        }

        .out-table .set tr .white-box {
            background-color: white;
            padding: 20px;
        }

    </style>
    <div class="text-center">
        <h1>
            This is new order page
        </h1>
    </div>
    <div class="out-table">
        <table class="table text-center">
            <thead>
                <div>
                    <tr>
                        <th>No.</th>
                        <th class="">Customer Name</th>
                        <th>Product Name</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Quality</th>
                        <th>Total Price</th>
                        <th>OrderDate</th>
                        <th>Action</th>
                    </tr>
                </div>
            </thead>
            <tbody class="set">
                <tr>
                    <div class="white-box">
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>
                            <a href="#"><img src="/images/logo/EditButtonSeller.svg"></a>
                            <a href="#"><img src="/images/logo/DeleteButton.svg"></a>
                        </td>
                    </div>
                </tr>
            </tbody>
        </table>
    </div>
@stop
