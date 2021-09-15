<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ URL::asset('logo.png') }}" type="image/x-icon">
    <title>B A S K E T</title>
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

        .swal_size_me {
            width: 300px;
            font-size: 10px;
        }

    </style>
</head>

<body>
    @include('layouts/navbar')
    <div class="bg-color">
        @yield('content')
    </div>

    @include('layouts/footer')
    @include('/home/components/script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    {{-- me................................................................ --}}
    {{-- scroll_comment() {
        document.getElementById('scroll').scrollTop = document.getElementById('scroll').scrollHeight
    } --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.submit_add_to_cart', function(e) {
                e.preventDefault();
                var cart_id = $(this).val();
                // alert(cart_id);
                $('#value_cart_id').val(cart_id);
                //console.log('good');
                var data = {
                    //'user_id': $('.class_user_id').val(),
                    'product_id': $('.class_product_id').val(),
                    //'total': $('.class_total').val(),
                    //'quantity': $('.class_quantity').val(),
                }
                //console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/add-to-cart",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        //console.log(response);
                        if (response.status == 200) {
                            Swal.fire({
                                position: 'top-cennter',
                                icon: 'success',
                                title: 'Added to cart',
                                customClass: 'swal_size_me',
                                showConfirmButton: false,
                                timer: 1000
                            })
                            $('.totalcart_for_me').html('');
                            $('.totalcart_for_me').text(
                                response.total);
                        }
                    }
                });
            });
        });

        $(document).ready(function() {



            $(document).on('click', '.submit_wish_list', function(e) {
                e.preventDefault();
                //console.log('good');
                var wishlist_id = $(this).val();
                // alert(cart_id);
                $('#value_wishlist_id').val(wishlist_id);

                var data = {
                    //'u_id': $('.class_u_id').val(),
                    'pro_id': $('.class_pro_id').val(),
                }
                //console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/add-to-wishlist",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        //console.log(response);
                        if (response.status == 200) {
                            Swal.fire({
                                position: 'top-cennter',
                                icon: 'success',
                                title: 'Added to wishlist',
                                customClass: 'swal_size_me',
                                showConfirmButton: false,
                                timer: 1000
                            })
                            $('.totalWishlist_for_me').html('');
                            $('.totalWishlist_for_me').text(
                                response.totalWishlist);
                        }
                    }
                });
            });
        });

        $(document).ready(function() {

            fetch_comment();
            setInterval(fetch_comment3, 1000);

            function updateScroll() {
                var element = document.getElementById("comment_id_scroll");
                element.scrollTop = element.scrollHeight;
            }
            var index = 0;

            function fetch_comment() {
                var data = {
                    'product_comment_id': $('.product_comment_id').val(),
                    'user_id': $('.user_id_post_comment').val(),
                }
                $.ajax({
                    type: "GET",
                    url: "/get_comment",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $('.commmmmmm').html('');
                        $.each(response.comment, function(key, item) {
                            if (data.user_id == null) {
                                $('.commmmmmm').append(
                                    '<div class="cs-card mb-2"><div class="p-1"><div class="name not_user">' +
                                    item.username +
                                    '</div><small class="not_user_comment">' + item
                                    .comment + '</small></div></div>');
                            }
                            if (item.user_id == data.user_id) {
                                $('.commmmmmm').append(
                                    '<div class="cs-card mb-2"><div class="p-1"><div class="name text-right not_user">' +
                                    item.username +
                                    '</div><small class="not_user_comment">' + item
                                    .comment + '</small></div></div>');
                            } else {
                                $('.commmmmmm').append(
                                    '<div class="cs-card mb-2"><div class="p-1"><div class="name not_user">' +
                                    item.username +
                                    '</div><small class="not_user_comment">' + item
                                    .comment + '</small></div></div>');
                            }
                            updateScroll()
                        });
                    }
                });
            }

            function fetch_comment3() {
                var data = {
                    'product_comment_id': $('.product_comment_id').val(),
                    'user_id': $('.user_id_post_comment').val(),
                }
                $.ajax({
                    type: "GET",
                    url: "/get_comment",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $('.commmmmmm').html('');
                        $.each(response.comment, function(key, item) {
                            if (data.user_id == null) {
                                $('.commmmmmm').append(
                                    '<div class="cs-card mb-2"><div class="p-1"><div class="name not_user">' +
                                    item.username +
                                    '</div><small class="not_user_comment">' + item
                                    .comment + '</small></div></div>');
                            }
                            if (item.user_id == data.user_id) {
                                $('.commmmmmm').append(
                                    '<div class="cs-card mb-2"><div class="p-1"><div class="name text-right not_user">' +
                                    item.username +
                                    '</div><small class="not_user_comment">' + item
                                    .comment + '</small></div></div>');
                            } else {
                                $('.commmmmmm').append(
                                    '<div class="cs-card mb-2"><div class="p-1"><div class="name not_user">' +
                                    item.username +
                                    '</div><small class="not_user_comment">' + item
                                    .comment + '</small></div></div>');
                            }
                        });
                    }
                });
            }

            function clearText() {
                document.getElementById('textcommentfield').value = "";
            }

            $(document).on('click', '.submit_post_comment', function(e) {
                e.preventDefault();
                //console.log('good');
                var data = {
                    'comment': $('.comment_value').val(),
                    'user_id': $('.user_id_post_comment').val(),
                    'product_comment_id': $('.product_comment_id').val(),
                }
                clearText();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/post_comment_product",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        //console.log(response);
                        if (response.status == 200) {
                            //console.log(response.comment);
                            fetch_comment();
                        }
                    }
                });
            });
        });
    </script>
    <div hidden class="class_pro_id" id="value_wishlist_id"></div>
    <div hidden class="class_product_id" id="value_cart_id"></div>
    {{-- me................................................................ --}}
</body>

</html>
