<div class="container">
    <div class="text-center">
        @if (Session::has('delete-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('delete-success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>
<div class="container">
    <div class="text-center">
        @if (Session::has('brand_add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('brand_add') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>