<div class="brand mt-4">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <h1>
                Select Product by Brand
            </h1>
        </div>
        <div class="col-md-4 text-right">
            <h1>
                <a href=""> See all</a>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="horizontal1">
                @foreach ($brand as $item)
                    <img src="/images/brandImages/{{ $item->brand_img }}">
                @endforeach
            </div>
            <div class="border-bottom mt-2"></div>
        </div>
    </div>
</div>
