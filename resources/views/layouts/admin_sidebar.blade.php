<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700&display=swap"
        rel="stylesheet">
</head>
<style>
    * {
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .wrapper {
        display: flex;
        position: relative;
    }

    .wrapper .sidebar {
        position: fixed;
        width: 250px;
        height: 100%;
        background-color: #4B7095;
    }

    .wrapper .sidebar ul li {
        padding: 15px;
    }

    .wrapper .sidebar img {
        width: 184px;
        height: 138px;
        border-radius: 5px;
    }

    .wrapper .sidebar ul li a {
        text-decoration: none;
    }

    .wrapper .sidebar ul li a i {
        font-size: 20px;
        color: #FFFFFF;
    }

    .wrapper .sidebar ul li a div {
        font-weight: 300;
        font-size: 16px;
        line-height: 27px;
        color: #FFFFFF;
    }

    .wrapper .sidebar ul li a .ac {
        color: #FFA79B;
    }

    .main {
        margin-left: 300px;
        margin-right: 50px;
    }

    .wrapper .sidebar ul li a img {
        width: 30px;
        height: 24px;
    }

    .seller-list a {
        color: #323b49;
        text-decoration: none;
    }

    .user-list a {
        color: #323b49;
        text-decoration: none;
    }

</style>

<body>
    <div class="wrapper">
        <div class="sidebar shadow-sm">
            <div class="text-center mt-4 mb-4">
                <a href=""><img src="https://wallpaperaccess.com/full/3143683.jpg" alt="" class="img-fluid"></a>
            </div>
            <ul class="text-center">
                <li>
                    <a clas href="{{ url('/admin') }}">
                        <img src="/images/sidebar-logo/1.svg" alt="">
                        <div class=" {{ Request::is('admin/dashboard') ? 'ac' : '' }}">
                            Dashboard
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/user') }}">
                        <img src="/images/sidebar-logo/4.svg" alt="">
                        <div class=" {{ Request::is('admin/user*') ? 'ac' : '' }}">
                            User
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/seller') }}">
                        <img src="/images/sidebar-logo/2.svg" alt="">
                        <div class=" {{ Request::is('admin/seller*') ? 'ac' : '' }}">
                            Seller
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/product') }}">
                        <img src="/images/sidebar-logo/3.svg" alt="">
                        <div class=" {{ Request::is('admin/product') ? 'ac' : '' }}">
                            Product
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/brand') }}">
                        <img src="/images/sidebar-logo/5.svg" alt="">
                        <div class=" {{ Request::is('admin/brand') || Request::is('admin/add-brand') ? 'ac' : '' }}">
                            Brand
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/category') }}">
                        <img src="/images/sidebar-logo/6.svg" alt="">
                        <div class=" {{ Request::is('admin/category') ? 'ac' : '' }}">
                            Category
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/') }}">
                        <div class=" {{ Request::is('/') ? 'ac' : '' }}">
                            Go To Website PLP
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main">
        @yield('sidebar-content')
    </div>

    <script src="https://kit.fontawesome.com/35caa7975b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>
