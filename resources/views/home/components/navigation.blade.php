<div class="container">
    @if (\Route::current()->getName() == '')

    @elseif (\Route::current()->getName() == 'category')
        <a href="/">Home</a> > <a href="/category">Category</a>
    @elseif (\Route::current()->getName() == 'categoryItem')
        <a href="/">Home</a> > <a href="/category/{{ $cate_name->id }}">CategoryItem</a>
    @elseif (\Route::current()->getName() == 'detail')
        <a href="/">Home</a> > <a href="/product/{{ $product_id->id }}">Detail product</a>
    @elseif (\Route::current()->getName() == 'products')
        <a href="/">Home</a> > <a href="/product">All products</a>
    @elseif (\Route::current()->getName() == 'brandItem')
        <a href="/">Home</a> > <a href="/brand/{{ $brand_id->id }}">BrandItem</a>
    @elseif (\Route::current()->getName() == 'brands')
        <a href="/">Home</a> > <a href="/brand">Brands</a>
    @elseif (\Route::current()->getName() == 'recentlyProducts')
        <a href="/">Home</a> > <a href="/recenltyProduct">Recently add</a>
    @elseif (\Route::current()->getName() == 'recentlyProductsDetail')
        <a href="/">Home</a>
        >
        <a href="/recenltyProduct">Recently add</a>
        >
        <a href="/recenltyProduct/product/{{ $product_id->id }}">{{ $product_id->name }}</a>
    @endif
</div>
