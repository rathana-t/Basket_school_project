<nav id="sidebar">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="text-center mt-4">
        <a href=""><img src="https://wallpaperaccess.com/full/3143683.jpg" alt="" class="img-fluid"></a>
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
                        <span class="pl-3">Products</span>
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
                <a clas href="/seller/old-order">
                    <div class=" {{ Request::is('seller*/old-order') ? 'ac' : '' }} mt-2">
                        <img src="/images/sidebar-logo/3.svg" alt="">
                        <span class="pl-3">Old orders</span>
                    </div>
                </a>
            </li>
            <li>
                <a clas href="/seller/profile">
                    <div>
                        <img src="/images/sidebar-seller-logo/align.svg" alt="">
                        <span class="pl-3">Profile</span>
                    </div>
                </a>
            </li>
            <li>
                <a clas href="/seller/messages">
                    <div>
                        <img src="/images/sidebar-seller-logo/align.svg" alt="">
                        <span class="pl-3">Messages</span>
                    </div>
                </a>
            </li>
            <li>
                <a>
                    <div>
                        Go To Website PLP
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>
