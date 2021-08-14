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
@if (Session::has('add-to-wishlist-success'))
    <div class="alert alert-danger alert-dismissible fade show " id="hideMe" role="alert">
        {{ Session::get('add-to-wishlist-success') }}
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
