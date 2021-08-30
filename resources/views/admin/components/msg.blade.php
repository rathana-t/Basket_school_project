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
        @if (Session::has('delete-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('delete-success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('reject_request'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('reject_request') }}
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
