<div class="seller">
    <div class="dashboard">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <a href="/seller/products">
                    <div
                        class="card shadow-sm rounded {{ Request::is('seller/products') ? 'bg-dark border-0' : 'bg-light' }}">
                        <div class="card-body  {{ Request::is('seller/products') ? 'text-white' : 'text-dark' }}">
                            <div>
                                Products
                            </div>
                            <div>
                                15
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="/seller/productPending">
                    <div
                        class="card shadow-sm rounded {{ Request::is('seller/productPending') ? 'bg-dark border-0' : 'bg-light' }}">
                        <div
                            class="card-body {{ Request::is('seller/productPending') ? 'text-white' : 'text-dark' }}">
                            <div>
                                Pending Products
                            </div>
                            <div>
                                15
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="/seller/choose-category">
                    <div
                        class="card shadow-sm rounded {{ Request::is('seller/choose-category') || Request::is('seller/add-product*') ? 'bg-dark border-0' : 'bg-light' }}">
                        <div
                            class="card-body {{ Request::is('seller/choose-category') || Request::is('seller/add-product*') ? 'text-white' : 'text-dark' }}">
                            <div>
                                Add Product
                            </div>
                            <div>
                                15
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
