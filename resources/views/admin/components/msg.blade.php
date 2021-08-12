<div class="container">
    <div class="text-center">
        @if (Session::has('delete-se-cate'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('delete-se-cate') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('add-to-cart-success'))
            <div class="alert alert-success alert-dismissible fade show " id="hideMe" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                {{ Session::get('add-to-cart-success') }}
            </div>
        @endif
        @if (Session::has('add-to-wishlist-success'))
            <div class="alert alert-warning alert-dismissible fade show " id="hideMe" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z">
                    </path>
                </svg>
                {{ Session::get('add-to-wishlist-success') }}
            </div>
        @endif
        @if (Session::has('remove-wishlist-success'))
            <div class="alert alert-danger alert-dismissible fade show " id="hideMe2" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
                    viewBox="0 0 16 16">
                    <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                    </path>
                    <path fill-rule="evenodd"
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                    </path>
                </svg>
                {{ Session::get('remove-wishlist-success') }}
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
        position: relative;
        position: absolute;
        left: 700px;
        top: 150px;
        -webkit-animation: cssAnimation 1.5s forwards;
        animation: cssAnimation 1.5s forwards;

    }

    #hideMe2 {
        padding: 10px;
        position: absolute;
        left: 700px;
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
