<nav id="sidebar">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="text-center mt-4 sellerImg">
        <a href=""><img src="/images/sellerProfile/{{ $data_seller->profile }}" alt="" class="img-fluid"></a>
    </div>
    <div class="p-4">
        <ul class="mb-5 list-unstyled components">
            <li>
                <a clas href="/seller/dashboard">
                    <div class=" {{ Request::is('seller*/dashboard') ? 'ac' : '' }} mt-2">
                        <img src="/images/sidebar-logo/1.svg" alt="">
                        <span class="pl-3">Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div>
                        <img src="/images/sidebar-logo/3.svg" alt="">
                        <span class="pl-3 {{ Request::is('seller*/products') ? 'ac' : '' }}">Products</span>
                    </div>
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <div class="cs-dropdown">
                        <a clas href="/seller/products ">
                            <div class="pl-3 {{ Request::is('seller*/products') ? 'ac' : '' }} mt-2">
                                Product
                            </div>
                        </a>
                        <a clas href="/seller/choose-category ">
                            <div
                                class="pl-3 {{ Request::is('seller/choose-category') || Request::is('seller/add-product*') ? 'ac' : '' }} mt-2">
                                Add Product
                            </div>
                        </a>
                        <a clas href="/seller/productPending ">
                            <div class="pl-3 mt-2 {{ Request::is('seller*/productPending') ? 'ac' : '' }}">
                                Pending Products
                            </div>
                        </a>
                    </div>
                </ul>
            </li>
            <li>
                <a clas href="/seller/new-order">
                    <div class=" {{ Request::is('seller*/new-order') ? 'ac' : '' }} mt-2">
                        <img src="/images/sidebar-seller-logo/history.svg" alt="">
                        <span class="pl-3">New orders</span>
                    </div>
                </a>
            </li>
            <li>
                <a clas href="/seller/processing">
                    <div class=" {{ Request::is('seller*/processing') ? 'ac' : '' }} mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-hourglass-split" viewBox="0 0 16 16">
                            <path
                                d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                        </svg>
                        <span class="pl-3">Processing</span>
                    </div>
                </a>
            </li>
            <li>
                <a clas href="/seller/old-order">
                    <div class=" {{ Request::is('seller*/old-order') ? 'ac' : '' }} mt-2">
                        <img src="/images/sidebar-logo/3.svg" alt="">
                        <span class="pl-3">Old orders</span>
                    </div>
                </a>
            </li>
            <li>
                <a clas href="/seller/profile">
                    <div class=" {{ Request::is('seller*/profile') ? 'ac' : '' }} mt-2">
                        <img src="/images/sidebar-seller-logo/align.svg" alt="">
                        <span class="pl-3">Profile</span>
                    </div>
                </a>
            </li>
            <li>
                <a clas href="/seller/messages">
                    <div class=" {{ Request::is('seller*/messages') ? 'ac' : '' }} mt-2">
                        <img src="/images/sidebar-seller-logo/align.svg" alt="">
                        <span class="pl-3">Messages</span>
                    </div>
                </a>
            </li>
            <li>
                <a>
                    <div>
                        <a href="{{ url('/') }}">
                            <div class=" {{ Request::is('/') ? 'ac' : '' }}">
                                Go To Website PLP
                            </div>
                        </a>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>
