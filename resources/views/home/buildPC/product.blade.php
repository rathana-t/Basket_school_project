<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ URL::asset('mee_tnam.jpg') }}" type="image/x-icon">
    <title>Document</title>
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Chrome, Safari, Edge, Opera */
        #exampleInputPhone::-webkit-outer-spin-button,
        #exampleInputPhone::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        #exampleInputPhone[type=number] {
            -moz-appearance: textfield;
        }

    </style>
</head>

<body>

    <div class="bg-color">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-3 ">
                    <div class="card sticky-top">
                        <form action="{{ url('CustomPC/search-filter') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="search-filter">
                                <div class="m-3">
                                    <label for="exampleInputEmail1">Product</label>
                                    <input type="text" class="form-control" id="exampleInputPhone"
                                        placeholder="Product name" value="{{ $pro_name }}" name="pro_name">
                                    <label for="exampleInputEmail1" class="mt-2">brand</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                        <option value="{{ $brand_id }}">All brands</option>
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $brandId) selected @endif>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
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

                                    <label for="exampleInputEmail1" class="mt-2">Sort</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="sort">
                                        <option value="h_l" @if ($sort == 'h_l') selected @endif>High-low</option>
                                        <option value="l_h" @if ($sort == 'l_h') selected @endif>Low-high</option>
                                    </select>
                                    <div class="text-center">
                                        <input hidden type="text" name="s_cate_id" id="" value="{{ $s_cate_id }}">
                                        <input hidden type="text" name="A_U" id="" value="{{ $A_U }}">
                                        <button type="submit" class="btn btn-primary mt-3">
                                            search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9 search">
                    <div class="row">
                        @foreach ($data as $item)
                            <div class="col-xs-6 col-sm-4">
                                <div class="card mb-3">
                                    <div class="p-3">
                                        <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}"
                                            alt="" class="img-fluid">
                                        <div class="product_name">
                                            <div class="b">
                                                {{ $item->name }}
                                            </div>
                                        </div>
                                        <div class="store_name">
                                            <a href="" class="text-muted">{{ $item->store_name }}</a>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">
                                                    ${{ $item->price }}
                                                </div>
                                            </div>
                                            <div class="col text-right">
                                                @if ($item->stock <= 0)
                                                    <button class="btn btn-warning mt-2" style="width: 170px">
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
                                                    <form action="{{ url('CustomPC/select') }}" method="POST">
                                                        @csrf
                                                        <input hidden type="text" value="{{ $item->id }}" name="id"
                                                            id="">
                                                        <input hidden type="text" value="{{ $item->s_cat_id }}"
                                                            name="se_cate_id" id="">
                                                        <input hidden type="text" value="{{ $A_U }}"
                                                            name="A_U" id="">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 170px">
                                                            select
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{ $data->links() }}
        </div>
    </div>

</body>

</html>
