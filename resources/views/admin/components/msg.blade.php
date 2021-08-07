<div class="container">
    <div class="text-center">
        @if (Session::has('add-to-cart-success'))
            <div class="alert alert-success alert-dismissible fade show " id="hideMe" role="alert">
                {{ Session::get('add-to-cart-success') }}
                (icon)
            </div>
        @endif
        @if (Session::has('delete-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('delete-success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('brand_add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('brand_add') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('cate_add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('cate_add') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('2ndCate_add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('2ndCate_add') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('confirm_request'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('confirm_request') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>
<style>
    #hideMe {
        padding: 10px;
        position: absolute;
        left: -100px;
        top: 250px;
        -webkit-animation: cssAnimation 1.5s forwards;
        animation: cssAnimation 1.5s forwards;

    }

    @keyframes cssAnimation {
        0% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    @-webkit-keyframes cssAnimation {
        0% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

</style>
