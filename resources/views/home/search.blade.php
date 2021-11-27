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
                                    <select name="search_fill" class="form-control search_fill_seach_filter">
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
                                    <input type="text" class="form-control pro_name_seach_filter" placeholder="Search..."
                                        id="seach_input_value" value="{{ $pro_name }}" name="pro_name">
                                </div>
                                <div class="ml-3 mr-3 mt-2 mb-2">
                                    <label for="exampleInputEmail1" class="mt-2">brand</label>
                                    <select class="form-control brand_id_seach_filter" id="exampleFormControlSelect1"
                                        name="brand_id">
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
                                            <input id="min" class="form-control min_seach_filter" placeholder="Min"
                                                value="{{ $min_price }}" name="min" type="number" min="0" />
                                        </div>
                                        <div class="col">
                                            <input id="max" class="form-control max_seach_filter" placeholder="Max"
                                                name="max" value="{{ $max_price }}" type="number" min="0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-3 mr-3 mt-2 mb-2">
                                    <label for="exampleInputEmail1" class="mt-2">Sort</label>
                                    <select class="form-control sort_seach_filter" id="exampleFormControlSelect1"
                                        name="sort">
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
                <div id="old_search_page" class="col-md-9">
                    @include('layouts.result_search')
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
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

        $(document).ready(function() {

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                searchfilter_ajax(page);
            });

            $('#seach_input_value').on('keyup', function() {
                $seach_input_value = $(this).val();
                searchfilter_ajax(1);
            });

            $('.min_seach_filter').on('keyup', function() {
                $seach_input_value = $(this).val();
                searchfilter_ajax(1);
            });

            $('.max_seach_filter').on('keyup', function() {
                $seach_input_value = $(this).val();
                searchfilter_ajax(1);
            });

            $('.sort_seach_filter').on('change', function() {
                searchfilter_ajax();
            });

            $('.search_fill_seach_filter').on('change', function(e) {
                searchfilter_ajax();
            });

            $('.brand_id_seach_filter').on('change', function(e) {
                searchfilter_ajax();
            });

        });

        function searchfilter_ajax(page) {

            // alert($seach_input_value);
            var data = {
                'min': $('.min_seach_filter').val(),
                'max': $('.max_seach_filter').val(),
                'pro_name': $('.pro_name_seach_filter').val(),
                'sort': $('.sort_seach_filter option:selected').val(),
                'brand_id': $('.brand_id_seach_filter option:selected').val(),
                'search_fill': $('.search_fill_seach_filter option:selected').val(),
            }
            {{-- console.log(data); --}}
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                data: data,
                url: "/search-filter2" + "?page=" + page,
                //dataType: "json",
                success: function(response) {
                    {{-- console.log(response); --}}
                    $('#old_search_page').html(response);

                }
            });
        }
    </script>
@endsection
