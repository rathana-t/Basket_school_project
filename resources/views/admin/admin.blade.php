<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    .user-list a {
        color: #323b49;
        text-decoration: none;
    }

    .seller-list img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 5px;
    }

    .seller-list a {
        color: #323b49;
        text-decoration: none;
    }

    .table td {
        vertical-align: middle;
    }

    .list a {
        color: #323b49;
        text-decoration: none;
    }

    .list img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 5px;
    }

</style>

<body>
    @include('component\adminSidebar')

    <div class="main">
        @include('component\msg')
        @yield('sidebar-content')
    </div>

    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
        $(document).ready(function() {
            $(document).on('click', '.deletebtn', function() {
                var prod_id = $(this).val();
                // alert(prod_id);
                $('#DeleteModal').modal('show');
                $('#delete_id').val(prod_id)
            })
        });
    </script>

    <script src="https://kit.fontawesome.com/35caa7975b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>
