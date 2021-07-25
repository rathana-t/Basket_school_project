@extends('blog/layout')

@section('content')
    <div class="container">
        <div class="background-img">
            <div class="background-color">
                <div class="text-center pt-4 mt-4">
                    <h1>Make Money with us </h1>
                    @if (Session::has('seller'))
                    
                @else
                    <a class="btn btn-primary btn-lg" href="{{ url('sellerRegisterPage') }}" role="button">Register</a>
                @endif
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

@endsection