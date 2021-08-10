<div class="container mt-4 mb-4">
    <style>
        .navigation a {
            text-decoration: none;
            font-size: 16px;
            color: #323b49;
        }

        .navigation .ac {
            color: #035ebe;
        }

    </style>
    <div class="navigation">
        @if (\Route::current()->getName() == '')

        @elseif (\Route::current()->getName() == 'category')
            <a href="/#Category">Home</a>
            >
            <a href="/category" class="ac">All Category</a>

        @elseif (\Route::current()->getName() == 'categoryItem')
            <a href="/">Home</a>
            >
            <a href="/category">All Category</a>
            >
            <a href="/category/{{ $cate_name->id }}" class="ac">{{ $cate_name->name }}</a>


        @elseif (\Route::current()->getName() == 'detail')
            <a href="/">Home</a>
            >
            <a href="/product/{{ $product_id->id }}" class="ac">Detail product</a>

        @elseif (\Route::current()->getName() == 'products')
            <a href="/#Product">Home</a>
            >
            <a href="/product" class="ac">All products</a>

        @elseif (\Route::current()->getName() == 'productItem')
            <a href="/#Product">Home</a>
            >
            <a href="/product">All products</a>
            >
            <a href="/product/product/{{ $product_id->id }}" class="ac">{{ $product_id->name }}</a>

        @elseif (\Route::current()->getName() == 'smallcate')
            <a href="/#Subcategory">Home</a>
            >
            <a href="/smallcate" class="ac">All subcategory</a>

        @elseif (\Route::current()->getName() == 'brandItem')
            <a href="/">Home</a>
            >
            <a href="/brand/{{ $brand_id->id }}" class="ac">BrandItem</a>

        @elseif (\Route::current()->getName() == 'brands')
            <a href="/#Brand">Home</a>
            >
            <a href="/brand" class="ac">All Brands</a>
        @endif
    </div>

</div>
