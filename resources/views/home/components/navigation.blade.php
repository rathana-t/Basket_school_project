<div class="container pt-4 pb-2">
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

        @elseif (\Route::current()->getName() == 'route_cart')
            <a href="/#Product">Home</a>
            >
            <a href="/product">Products</a>
            >
            <a href="/cart" class="ac">Cart</a>
        @elseif (\Route::current()->getName() == 'category')
            <a href="/#Category">Home</a>
            >
            <a href="/category" class="ac">Category</a>

        @elseif (\Route::current()->getName() == 'categoryItem')
            <a href="/#Category">Home</a>
            >
            <a href="/category">Category</a>
            >
            <a href="/category/{{ $cate_name->id }}" class="ac">{{ $cate_name->name }}</a>

        @elseif (\Route::current()->getName() == 'categoryProductItem')
            <a href="/#Category">Home</a>
            >
            <a href="/category">Category</a>
            >
            <a href="/category/{{ $categoryId->id }}">{{ $categoryId->name }}</a>
            >
            <a href="/category/{{ $categoryId->id }}/product/{{ $product_id->id }}"
                class="ac">{{ $product_id->name }}</a>

        @elseif (\Route::current()->getName() == 'products')
            <a href="/#Product">Home</a>
            >
            <a href="/product" class="ac">Products</a>

        @elseif (\Route::current()->getName() == 'product_search_filter')
            <a href="/#Product">Home</a>
            >
            <a href="/product" class="ac">Products</a>

        @elseif (\Route::current()->getName() == 'productItem')
            <a href="/#Product">Home</a>
            >
            <a href="/product">Products</a>
            >
            <a href="/product/product/{{ $product_id->id }}" class="ac">{{ $product_id->name }}</a>

        @elseif (\Route::current()->getName() == 'smallcate')
            <a href="/#Subcategory">Home</a>
            >
            <a href="/category">Category</a>
            >
            <a href="/smallcate" class="ac">Subcategory</a>

        @elseif (\Route::current()->getName() == 'smallcateItem')
            <a href="/#Subcategory">Home</a>
            >
            <a href="/category">Category</a>
            >
            <a href="/smallcate">Subcategory</a>
            >
            <a href="/smallcate/{{ $smallCateName->id }}" class="ac">{{ $smallCateName->name }}</a>

        @elseif (\Route::current()->getName() == 'smallcateProductItem')
            <a href="/#Subcategory">Home</a>
            >
            <a href="/category">Category</a>
            >
            <a href="/smallcate">Subcategory</a>
            >
            <a href="/smallcate/{{ $smallCate->id }}">{{ $smallCate->name }}</a>
            >
            <a href="/smallcate/{{ $smallCate->id }}/product/{{ $product_id->id }}"
                class="ac">{{ $product_id->name }}</a>

        @elseif (\Route::current()->getName() == 'brands')
            <a href="/#Brand">Home</a>
            >
            <a href="/brand" class="ac">Brands</a>

        @elseif (\Route::current()->getName() == 'brandItem')
            <a href="/#Brand">Home</a>
            >
            <a href="/brand">Brands</a>
            >
            <a href="/brand/{{ $brand_id->id }}" class="ac">{{ $brand_id->name }}</a>

        @elseif (\Route::current()->getName() == 'brandProductItem')
            <a href="/#Brand">Home</a>
            >
            <a href="/brand">Brands</a>
            >
            <a href="/brand/{{ $brand->id }}">{{ $brand->name }}</a>
            >
            <a href="/brand/{{ $brand->id }}/product/{{ $product_id->id }}"
                class="ac">{{ $product_id->name }}</a>
        @endif
    </div>

</div>
