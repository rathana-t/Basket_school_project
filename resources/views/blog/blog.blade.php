<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PLP-Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Loop&family=Zen+Tokyo+Zoo&display=swap" rel="stylesheet">
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
    }

    .background-img {
        background-image: url("/images/office.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        height: 300px;
    }

    .background-img h1 {
        font-style: normal;
        font-weight: 500;
        font-size: 36px;
        line-height: 108px;
        color: #EAF3FD;
    }

    .background-img .background-color {
        height: 300px;
        background: rgba(0, 0, 0, 0.4);
        opacity: 1;
    }

    p {
        font-weight: 400;
        font-size: 14px;
        line-height: 21px;
        color: #19252E;
    }

    .slider {
        position: relative;
        overflow: hidden;
    }

    .slider h1 {
        font-family: 'Zen Loop', cursive;
        font-family: 'Zen Tokyo Zoo', cursive;
        font-size: 36px;
        color: #EAF3FD;
    }

    .slider p {
        font-weight: normal;
        font-size: 16px;
        line-height: 24px;
        color: #ffffff;
        opacity: 0.8;
    }

    .navbar a {
        color: #19252E !important;
    }

    .inside-slides {
        height: 500px;
        background: rgba(0, 0, 0, 0.4);
        width: 100%;
        position: absolute;
    }

    .slides {
        width: 500%;
        height: 500px;
        display: flex;
    }

    .slides input {
        display: none;
    }

    .slide {
        width: 20%;
        transition: 1s;
    }

    .slide img {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    .navigation-manual {
        position: absolute;
        margin-top: -40px;
        display: flex;
        justify-content: center;
    }

    .manual-btn {
        border: 2px solid #ffff;
        padding: 5px;
        border-radius: 10px;
        cursor: pointer;
        transition: 1s;
    }

    .manual-btn:not(:last-child) {
        margin-right: 20px;
    }

    .manual-btn:hover {
        background: #ffff;
    }

    #radio1:checked~.first {
        margin-left: 0;
    }

    #radio2:checked~.first {
        margin-left: -20%;
    }

    #radio3:checked~.first {
        margin-left: -40%;
    }

    .sticky-footer {
        top: 100%;
        position: sticky;
        height: 264px;
        background: #f8f9fa;
    }

    .sticky-footer h1 {
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 45px;
        color: #19252E;
    }

    footer ul li {
        padding: 5px 0px;
    }

    .money li a,
    .contact li a,
    .about li a {
        text-decoration: none;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 45px;
        color: #19252E;
    }

    .money,
    .contact,
    .about {
        list-style: none;
    }

    .earn h1 {
        font-style: normal;
        font-weight: normal;
        font-size: 30px;
        line-height: 45px;

        color: #19252E;
    }

    .btn-primary {
        background-color: #006FBF !important;
        border-color: #006FBF !important;
    }

</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="background-img">
            <div class="background-color">
                <div class="text-center pt-4 mt-4">
                    <h1>Make Money with us </h1>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Sign up</a>
                </div>
            </div>
        </div>
        <div class="m-5">
            <p>
                Welcome to one of the largest affiliate marketing programs in the world. The Amazon Associates Program
                helps content creators, publishers and bloggers monetize their traffic. With millions of products and
                programs available on Amazon, associates use easy link-building tools to direct their audience to their
                recommendations, and earn from qualifying purchases and programs.
            </p>
        </div>
        <div class="mt-5 mb-4 text-center earn">
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/blog/signup.svg" alt="">
                    <h1>
                        Sign up
                    </h1>
                    <h1>
                        1
                    </h1>
                    <p>
                        Join tens of thousands of creators, publishers and bloggers who are earning with the Amazon
                        Associates Program
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="/images/blog/rec.svg" alt="">
                    <h1>
                        Recommend
                    </h1>
                    <h1>
                        2
                    </h1>
                    <p>
                        Share millions of products with your audience. We have customized linking tools for large
                        publishers, individual bloggers and social media influencers.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="/images/blog/earn.svg" alt="">
                    <h1>
                        Earn
                    </h1>
                    <h1>
                        3
                    </h1>
                    <p>
                        Earn up to 10% in associate commissions from qualifying purchases and programs. Our competitive
                        conversion rates help maximize earnings.
                    </p>
                </div>
            </div>
        </div>

        <div class="slider">
            <div class="slides">
                <div class="inside-slides">
                    <h1 class="m-5">
                        “We're able to find all technologies products on PLP that we want to recommend to our audience.
                        We
                        value being able to help our audience find and purchase what they need.”
                    </h1>
                </div>
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">

                <div class="slide first">
                    <img src="/images/blog/4.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="/images/blog/5.jpg" alt="">

                </div>

                <div class="slide">
                    <img src="/images/blog/6.png" alt="">
                </div>
            </div>
            <div class="container d-flex justify-content-center">
                <div class="navigation-manual">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                </div>
            </div>
        </div>
    </div>

    <footer class="sticky-footer d-flex align-items-center mt-5 shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 ">
                    <ul class="money">
                        <h1>Make Money With Us</h1>
                        <li>
                            <a href="{{url('/blog')}}">Sell product on our page</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                    <ul class="contact">
                        <h1>Contact Us</h1>
                        <li>
                            <a href="#">Facebook</a>
                        </li>

                        <li>
                            <a href="#">Instagram</a>
                        </li>

                        <li>
                            <a href="#">Telegram</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ">
                    <ul class="about">
                        <h1>About Us</h1>
                        <li>
                            <a href="">About us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>
