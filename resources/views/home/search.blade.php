@extends('application')
@section('content')

    <style>
        .search label {
            font-size: 16px;
            color: #035ebe;
        }

        .search .card .card-footer {
            background-color: white;
        }

    </style>

    <div class="container pt-4">
        <div class="search">
            <div class="row">
                <div class="col-md-3 ">
                    <div class="card">
                        <form action="{{ route('search-filter') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="search-filter">
                                <div class="ml-3 mr-3 mt-3 mb-2">
                                    <select name="search_fill" class="form-control">
                                        <option value="name" {{ $fill_searcch == 'name' ? 'selected' : '' }}>
                                            Name Product
                                        </option>
                                        <option value="code" {{ $fill_searcch == 'code' ? 'selected' : '' }}>
                                            Code Product
                                        </option>
                                    </select>
                                </div>
                                <hr>
                                <div class="ml-3 mr-3 mt-2 mb-2">
                                    <label for="exampleInputEmail1">Product</label>
                                    <input type="text" class="form-control" id="exampleInputPhone" placeholder="Search..."
                                        value="{{ $pro_name }}" name="pro_name">
                                </div>
                                <div class="ml-3 mr-3 mt-2 mb-2">
                                    <label for="exampleInputEmail1" class="mt-2">brand</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                        <option value="{{ $brand_id }}">All brands</option>
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $brandId) selected @endif>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="ml-3 mr-3 mt-2 mb-2">
                                    <label for="exampleInputEmail1" class="mt-2">Price</label>
                                    <div class="row">
                                        <div class="col">
                                            <input id="min" class="form-control" placeholder="Min"
                                                value="{{ $min_price }}" name="min" type="number" min="0" />
                                        </div>
                                        <div class="col">
                                            <input id="max" class="form-control" placeholder="Max" name="max"
                                                value="{{ $max_price }}" type="number" min="0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-3 mr-3 mt-2 mb-2">
                                    <label for="exampleInputEmail1" class="mt-2">Sort</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="sort">
                                        <option value="h_l" @if ($sort == 'h_l') selected @endif>High-low</option>
                                        <option value="l_h" @if ($sort == 'l_h') selected @endif>Low-high</option>
                                    </select>
                                </div>
                                <div class="ml-3 mr-3 mt-2 mb-3">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-3 col-12">
                                            Apply
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="search-height">
                        <div class="row">
                            @foreach ($data as $item)
                                <div class="col-3">
                                    <div class="card mb-3 shadow-sm rounded border-0">
                                        <div class="pt-2 pb-2 pl-3 pr-3">
                                            <a href="/product/product/{{ $item->id }}">
                                                <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}"
                                                    alt="" class="img-fluid">
                                            </a>
                                            <div class="product_name">
                                                <a href="/product/product/{{ $item->id }}">
                                                    <div class="b">
                                                        {{ $item->name }}
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between">
                                                <div class="price">
                                                    <a href="/product/product/{{ $item->id }}">
                                                        ${{ $item->price }}
                                                    </a>
                                                </div>
                                                <div class="row">
                                                    @if (Session::has('user'))
                                                        @if ($item->stock <= 0)
                                                            <button class="btn btn-sm btn-warning mr-2 ml-2 no-stock">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-bag-x-fill" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        @else
                                                            <button type="submit" value="{{ $item->id }}"
                                                                class="btn submit_add_to_cart btn-sm btn-primary mr-2 ml-2">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        @endif
                                                        <button type="button" value="{{ $item->id }}"
                                                            class="btn submit_wish_list btn-sm btn-dark mr-3">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-heart"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    @else
                                                        @if ($item->stock <= 0)
                                                            <button class="btn btn-sm btn-warning mr-2 ml-2 no-stock">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-bag-x-fill" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        @else
                                                            <a href="{{ url('login') }}"
                                                                class="btn btn-sm btn-primary mr-2 ml-2">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        @endif
                                                        <a href="{{ url('login') }}" class="btn btn-sm btn-dark mr-3">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-heart"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        // $(document).ready(function() {
        //     Swal.fire({
        //         position: 'top-end',
        //         icon: 'success',
        //         title: 'Add to cart',
        //         showConfirmButton: false,
        //         timer: 1000
        //     })
        // });
        $('.no-stock').click(function() {
            Swal.fire({
                title: 'Out Of Stock',
                showConfirmButton: false,
                customClass: 'swal_size_me',
                timer: 1000
            })
        });
    </script>
@endsection
