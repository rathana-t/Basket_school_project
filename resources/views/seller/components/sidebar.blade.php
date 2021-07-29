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
    <ul class="mb-5 list-unstyled components text-center">
        <li>
            <a clas href="/seller/dashboard">
                <img src="/images/sidebar-logo/1.svg" alt="">
                <div class=" {{ Request::is('seller*/dashboard') ? 'ac' : '' }} mt-2">
                    Dashboard
                </div>
            </a>
        </li>
        <li>
            <a clas href="/seller/products">
                <img src="/images/sidebar-logo/3.svg" alt="">
                <div class=" {{ Request::is('seller*/products') ? 'ac' : '' }} mt-2">
                    Product
                </div>
            </a>
        </li>
        <li>
            <a clas href="/seller/new-order">
                <img src="/images/sidebar-seller-logo/cart.svg" alt="">
                <div class=" {{ Request::is('seller*/new-order') ? 'ac' : '' }} mt-2">
                    New orders
                </div>
            </a>
        </li>
        <li>
            <a clas href="/seller/old-order">
                <img src="/images/sidebar-seller-logo/history.svg" alt="">
                <div class=" {{ Request::is('seller*/old-order') ? 'ac' : '' }} mt-2">
                    Old orders
                </div>
            </a>
        </li>
        <li>
            <a clas href="/seller/profile">
                <img src="/images/sidebar-seller-logo/align.svg" alt="">
                <div class=" {{ Request::is('seller*/profile') ? 'ac' : '' }} mt-2">
                    Profile
                </div>
            </a>
        </li>
        <li>
            <a clas href="/seller/messages">
                <img src="/images/sidebar-seller-logo/align.svg" alt="">
                <div class=" {{ Request::is('seller*/messages') ? 'ac' : '' }} mt-2">
                    Message
                </div>
            </a>
        </li>
        <li>
            <a href="{{ url('/') }}">
                <div class=" {{ Request::is('/') ? 'ac' : '' }}">
                    Go To Website PLP
                </div>
            </a>
        </li>
    </ul>
</nav>
