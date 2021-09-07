@extends('application')

@section('content')
    <div class="container">
        <div class="shopping-cart">
            <div class="container">
                <div class="pt-3">
                    <h5 class="mb-3">
                        Review products
                    </h5>
                    <div>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card mb-3 shadow-sm">
                                    <div class="p-2">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col" colspan="3">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_pro as $item)
                                                    <tr class="mb-3">
                                                        <td colspan="3">
                                                            <img style="width: 100px;"
                                                                src="/images/imgProduct/{{ $item->img_product }}" alt=""
                                                                class="img-fluid">
                                                            {{ $item->name }}
                                                        </td>
                                                        <td>
                                                            $ {{ $item->price }}
                                                        </td>
                                                        <td>
                                                            {{ $item->quantity }}
                                                            @if ($item->quantity > 1)
                                                                Items
                                                            @else
                                                                Item
                                                            @endif
                                                        </td>
                                                        <td>
                                                            $ {{ $item->total }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="countProduct">
                                        <div class="border-top">
                                            <div class="p-3">
                                                @if ($counter > 1)
                                                    @if ($quantity > 1)
                                                        <div class="p-2 ">
                                                            {{ $counter }} Products , {{ $quantity }} items
                                                        </div>
                                                    @else
                                                        <div class="p-2 ">
                                                            {{ $counter }} Products , {{ $quantity }} item
                                                        </div>
                                                    @endif
                                                @else
                                                    @if ($quantity > 1)
                                                        <div class="p-2 ">
                                                            {{ $counter }} Product , {{ $quantity }} items
                                                        </div>
                                                    @else
                                                        <div class="p-2 ">
                                                            {{ $counter }} Product , {{ $quantity }} item
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ url('/order/use_payment_method') }}" method="GET">
                                    @csrf
                                    <div class="pb-3">
                                        <label for="">Address</label>
                                        <textarea rows="4" class="form-control" id="" name="address" name="description"
                                            required style="width: 300px">{{ $data_user->address }}</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/cart" class="btn btn-secondary text-white">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Order</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
