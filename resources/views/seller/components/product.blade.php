<div class="seller">
    <div class="dashboard">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <a href="/seller/products">
                    <div
                        class="card shadow-sm rounded {{ Request::is('seller/products') ? 'bg-dark border-0' : 'bg-light' }}">
                        <div class="card-body  {{ Request::is('seller/products') ? 'text-white' : 'text-dark' }}">
                            <div class="text-center">
                                Products
                            </div>
                            <div class="text-center">
                                {{ $count_pro }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="/seller/products-out-of-stock">
                    <div
                        class="card shadow-sm rounded {{ Request::is('seller/products-out-of-stock') ? 'bg-dark border-0' : 'bg-light' }}">
                        <div
                            class="card-body  {{ Request::is('seller/products-out-of-stock') ? 'text-white' : 'text-dark' }}">
                            <div class="text-center">
                                Products out of Stock
                            </div>
                            <div class="text-center">
                                {{ $count_pro_out }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            {{-- <div class="col-md-3">
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
            </div> --}}
            <div class="col-md-3">
                <a href="/seller/choose-category">
                    <div
                        class="card shadow-sm rounded {{ Request::is('seller/choose-category') || Request::is('seller/add-product*') ? 'bg-dark border-0' : 'bg-light' }}">
                        <div
                            class="card-body {{ Request::is('seller/choose-category') || Request::is('seller/add-product*') ? 'text-white' : 'text-dark' }}">
                            <div class="text-center">
                                Post Product
                            </div>
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>
